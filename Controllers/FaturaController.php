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
                if($faturas == null){
                    $this-> renderView("erro", ["error" => "Não existe nenhuma fatura emitida", "route" => "", "type" => ""]);
                    return;
                }
                break;
            case "cliente":
                if($username == $_SESSION["username"]){
                    $faturas = Fatura::all(array('conditions'=>array('cliente_id = ? AND estado = ?', $user->id, "Emitida")));
                    if($faturas == null){
                        $this-> renderView("erro", ["error" => "Não existe nenhuma fatura emitida", "route" => "", "type" => ""]);
                        return;
                    }
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
        $fatura = new Fatura();       

        if(isset($_POST["cliente"])){
            if($_POST["cliente"] == null || $_POST["cliente"] < 0){
                $cliente_id = 0;
            }else{
                $cliente_id = $_POST["cliente"];
            }
        }else{
            $cliente_id = 0;
        }

        $dados =
        [
            "utilizador_id" => (int)Utilizador::find_by_username_and_pass($_SESSION["username"], $_SESSION["password"])->id,
            "cliente_id" => (int)$cliente_id,
            "valorTotal" => $_POST["total"],
            "ivaTotal" => $_POST["totalIva"],
            "estado" => "Em Lancamento"
        ];

        $error = $fatura->verificarDados($dados);

        
        if($error === true)
        {
            $fatura::create($dados); 
            $fatura = Fatura::last();
        }
        else
        {
            $produtos = Produto::all();
            $clientes = Utilizador::all(array('conditions' => 'role = "cliente"'));
            $this->renderView("registerfatura", ["error" => $error, 'produtos' => $produtos, "clientes" => $clientes]);
            return;
        }
                
        for($i = 0; $i < count($_POST["produto"]); $i++) 
        {    

            $quantidadeTotal = $_POST["quantidade"][$i] + $quantidadeTotal;

            $produto = Produto::getProduto($_POST["produto"][$i]);
            if($produto == false){
                $fatura = Fatura::last();
                $fatura->delete();
                $this-> redirectToRoute("");
                return;
            }

            $totalLinha = $produto->preco * $_POST["quantidade"][$i];
            $iva=Iva::getIvaValue($produto->iva_id);

            if($iva == false){
                $fatura = Fatura::last();
                $fatura->delete();
                $this-> redirectToRoute("");
                return;
            }


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
                $produto->changeStock($produto, $_POST["quantidade"][$i]);
                $this->redirecttoroute("");
            }
            else
            {
                $fatura->delete();
                $produtos = Produto::all();
                $clientes = Utilizador::all(array('conditions' => 'role = "cliente"'));
                $this->renderView("registerfatura", ["error" => "Quantidade Inválida", 'produtos' => $produtos, "clientes" => $clientes]);
               
            }    

        }

    }
    $this->redirectToRoute("fatura/index&i=".$_SESSION["username"]);
    }

    public function update($id){
        $auth = new Auth();
        $role = $auth->getRole();
        if($role != "funcionario" && $role != "administrador"){
            $this->redirectToRoute("");
            return;
        }

        $fatura = Fatura::find_by_id($id);
        if($fatura == null || $fatura->estado != "Em Lancamento"){
            $this->renderView("erro", ["error" => "Fatura Inválida", "route" => "fatura/index", "type" => $_SESSION["username"]]);
            return;
        }

        $fatura->changeEstado($id);
        $this->redirectToRoute("fatura/index&i=".$_SESSION["username"]);

        
    }


    public function delete($id){
        $auth = new Auth();
        $role = $auth->getRole();
        if($role != "funcionario" && $role != "administrador"){
            $this->redirectToRoute("");
            return;
        }

        $fatura = Fatura::find_by_id($id);
        if($fatura == null || $fatura->estado != "Em Lancamento"){
            $this->renderView("erro", ["error" => "Fatura Inválida", "route" => "fatura/index", "type" => $_SESSION["username"]]);
            return;
        }

        $linhas = LinhaFatura::all(array('conditions' => "fatura_id = $id"));

        foreach($linhas as $linha){
            $produto = Produto::find_by_id($linha->produto_id);
            $produto->revertStock($produto, $linha->quantidade);
            $linha->delete();

        }

        $fatura->delete();
        $this->redirectToRoute("fatura/index&i=".$_SESSION["username"]);
        
    }

    public function print($id)
    {
        $auth = new Auth();
        $role = $auth->getRole();

        
        $fatura = Fatura::find_by_id($id);

        if($fatura == null){
            $this->redirecttoroute("");
        }

        $empresa = Empresa::first();
        $cliente = Utilizador::find_by_id($fatura->cliente_id);
        $linhas = LinhaFatura::all(array('conditions' => 'Fatura_id = '.$fatura->id));



        if($role == "cliente" && $cliente->username == $_SESSION["username"]){
            $this->renderFatura(["empresa" => $empresa, "fatura" => $fatura, "cliente" => $cliente, "linhas" => $linhas]);
            return;
        }else if($role == "administrador" || $role == "funcionario"){
            $this->renderFatura(["empresa" => $empresa, "fatura" => $fatura, "cliente" => $cliente, "linhas" => $linhas]);
            return;
        }else{
            $this->redirecttoroute("");
        }

    }



}