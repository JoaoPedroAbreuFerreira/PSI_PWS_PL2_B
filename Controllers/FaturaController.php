<?php
require_once("./models/Auth.php");
require_once("./controllers/BaseController.php");

Class FaturaController extends Base
{
    public function show(){
        $produtos = Produto::all();
        $clientes = Utilizador::all(array('conditions' => 'role = "cliente"'));
        $this->renderView("registerfatura", ['produtos' => $produtos, "clientes" => $clientes]);

    }

    public function create()
    {
        $auth = new Auth();

        $role = Utilizador::getUserRole($_SESSION["username"], $_SESSION["password"]);       
        
        if($role != "funcionario" && $role != "administrador") 
        { 
            
            $this->redirectToRoute(ROTA_LOGIN); 
        }
        

        $fatura = new Fatura();

        $dados =
        [
            "utilizador_id" => (int)$_POST["cliente"],
            "valorTotal" => $_POST["total"],
            "ivaTotal" => $_POST["totalIva"],
            "estado" => "Em Lancamento"
        ];


        if($fatura->verificarDados($dados)){
            $fatura::create($dados); 
            $fatura = Fatura::last();
            
        }else{
            $this->redirectToRoute("fatura/show");

        }
                
        for($i = 0; $i < count($_POST["produto"]); $i++) 
        {    
            
            $produto = Produto::getProduto($_POST["produto"][$i]);
            $totalLinha = $produto->preco * $_POST["quantidade"][$i];


            $linhadados = 
            [
                "Fatura_id" => $fatura->id,
                "Produto_id" => $produto->id,
                "Produto_Iva_id" => $produto->iva_id,
                "Fatura_Utilizador_id" => $_POST["cliente"],
                "quantidade" => $_POST["quantidade"][$i],
                "valor" => $totalLinha
            ];


            $linha = new LinhaFatura();
            
            if($linha->verificarDados($linhadados)){
                $linha::create($linhadados);
                
                
            }else{
                
                $this->redirectToRoute("fatura/show");
    
            }

        }

        $fatura->changeEstado($fatura->id);
        $this->redirectToRoute("");

    }
}