<?php
require_once("./models/Auth.php");
require_once("./controllers/BaseController.php");

Class FaturaController extends Base
{
    public function index($username)
    {
        $auth = new Auth();
        $role = $auth->getRole();
        if($role == false){
            $this->redirectToRoute("");
        }else{

        
        $faturas = new Fatura();
        $cause = $faturas->verificarProdutosClientes();

        if($cause === true){

        $user = Utilizador::find_by_username($username);

        switch ($role){
            case "funcionario":
            case "administrador":
                $faturas = Fatura::all();
                break;
            case "cliente":
                if($username == $_SESSION["username"]){
                    $faturas = Fatura::all(array('conditions' => 'cliente_id = '.$user->id));
                }else{
                    $this->redirectToRoute("");
                }
                break;
            default:
                $this->redirectToRoute("");
            
        }
        $this->renderView("gestaofatura", ["faturas" => $faturas]);
        }else{
            $this->renderView("erro", ["error" => "Não existe nenhum $cause registado", "route" => "$cause/show", "type" => "cliente"]);

        }
    }
    }

    public function show(){
        $auth = new Auth();
        $role = $auth->getRole();
        if($role == "cliente" || $role == false){
            $this->redirectToRoute("");
        }else{

        $faturas = new Fatura();
        $cause = $faturas->verificarProdutosClientes();

        if($cause === true){
            $produtos = Produto::all();
            $clientes = Utilizador::all(array('conditions' => 'role = "cliente"'));
            $this->renderView("registerfatura", ['produtos' => $produtos, "clientes" => $clientes]);
        }else{
            $this->renderView("erro", ["error" => "Não existe nenhum $cause registado", "route" => "$cause/show", "type" => "cliente"]);
        }

    }

    }

    public function create()
    {
        $auth = new Auth();
        $role = $auth->getRole();
        if($role == "cliente" || $role == false){
            $this->redirectToRoute("");
        }else{

        
        $quantidadeTotal = 0;
        $role = Utilizador::getUserRole($_SESSION["username"], $_SESSION["password"]);       
        
        if($role != "funcionario" && $role != "administrador") 
        { 
            $this->renderView("erro", ["error" => "Não tem permissões para aceder a esta página", "route" => "", "type" => ""]);
        }
        
        $fatura = new Fatura();

        if($fatura->verificarTotal($_POST["total"])){
            $dados =
        [
            "utilizador_id" => (int)Utilizador::find_by_username_and_pass($_SESSION["username"], $_SESSION["password"])->id,
            "cliente_id" => (int)$_POST["cliente"],
            "valorTotal" => $_POST["total"],
            "ivaTotal" => $_POST["totalIva"],
            "estado" => "Em Lancamento"
        ];

        
        if($fatura->verificarDados($dados))
        {
            $fatura::create($dados); 
            $fatura = Fatura::last();
        }
        else
        {
            $this->renderView("erro", ["error" => "Erro nos parametros fornecidos fatura", "route" => "fatura/show", "type" => ""]);

        }
                
        for($i = 0; $i < count($_POST["produto"]); $i++) 
        {    

            $quantidadeTotal = $_POST["quantidade"][$i] + $quantidadeTotal;
            $produto = Produto::getProduto($_POST["produto"][$i]);
            $totalLinha = $produto->preco * $_POST["quantidade"][$i];
            $iva=Iva::getIvaValue($produto->iva_id);
            $ivalinha= $totalLinha * $iva / 100;

            $linhadados = 
            [
                "Fatura_id" => $fatura->id,
                "Produto_id" => $produto->id,
                "quantidade" => $_POST["quantidade"][$i],
                "valor" => $totalLinha,
                "valorIva" => $ivalinha
            ];

            $linha = new LinhaFatura();
            
            if($linha->verificarDados($linhadados))
            {
                $linha::create($linhadados); 
                $fatura->changeEstado($fatura->id);
                $produto->changeStock($produto, $_POST["quantidade"][$i]);
                $this->redirecttoroute("");
            }
            else
            {
                $fatura->delete();
                $this->renderView("erro", ["error" => "Erro Quantidade Inválida", "route" => "fatura/show", "type" => ""]);
               
            }    

        }
        }
        else{
            $this->renderView("erro", ["error" => "Erro adicione associe artigos a fatura", "route" => "fatura/show", "type" => ""]);
        }
    }
        
    }

    public function print($id)
    {
        $auth = new Auth();
        $empresa = Empresa::first();
        $fatura = Fatura::find_by_id($id);
        if($fatura == null){
            $this->redirecttoroute("");
        }
        $cliente = Utilizador::find_by_id($fatura->cliente_id);
        if($cliente->username != $_SESSION["username"]){
            $this->redirecttoroute("");
        }

        $linhas = LinhaFatura::all(array('conditions' => 'Fatura_id = '.$fatura->id));
        
        $this->renderFatura(["empresa" => $empresa, "fatura" => $fatura, "cliente" => $cliente, "linhas" => $linhas]);
    }



}