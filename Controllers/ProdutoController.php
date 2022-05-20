<?php 
require_once("./models/Auth.php");
require_once("./controllers/BaseController.php");

Class ProdutoController extends Base
{
    
    public function index(){
        $produtos = Produto::all();
        $this->renderView("gestaoproduto", ['produtos' => $produtos]);

    }

    public function show(){
        $ivas = Iva::all();
        $this->renderView("registerproduto", ['ivas' => $ivas]);
    }

    public function create(){
        $produto = new Produto();

        $dados = [
            "iva_id" => (int)$_POST["iva"],
            "referencia" => $_POST["referencia"],
            "preco" => $_POST["preco"],
            "descricao" => $_POST["desc"],
            "stock" => $_POST["stock"]
        ];

        if($produto->verificarDados($dados)){
            $produto::create($dados);
            $produto->save();
            $this->redirectToRoute("produto/index");

        }else{
            
            $this->redirectToRoute("produto/show");

        }
        

    }

    public function edit($id){
        $dados = [
            "iva_id" => (int)$_POST["iva"],
            "referencia" => $_POST["referencia"],
            "preco" => $_POST["preco"],
            "descricao" => $_POST["desc"],
            "stock" => $_POST["stock"]
        ];

        $produto = Produto::find_by_id($id);
        if($produto->verificarDados($dados)){
            extract($dados);
            $produto->update_attributes(array("referencia" => $referencia, "iva_id" => $iva_id, "descricao" => $descricao, "stock" => $stock, "preco" => $preco));
            $produto->save();
            $this->redirectToRoute("produto/index");
        }
        else{
            $this->redirectToRoute("produto/index");
        }
        
    }

    public function update($id){
        $produto = Produto::find_by_id($id);
        $ivas = Iva::all();
        $this->renderView("updateproduto", ['produto' => $produto, "ivas" => $ivas]);

    }

    public function delete($id){

        $produto = Produto::find_by_id($id);
        $produto->delete();
        $this->redirectToRoute("produto/index");


    }

    /*
    public function registerProduto()
    {
        $auth = new Auth();

        if($auth->isLoggedIn())
        {     
            if(isset($_POST["referencia"]) && isset($_POST["preco"]) && isset($_POST["desc"]) && isset($_POST["stock"]) && isset($_POST["produto"]))
            {
                $produto = new Produto();
                $produto->referencia = $_POST["referencia"];
                $produto->preco = $_POST["preco"];
                $produto->descricao = $_POST["desc"];
                $produto->stock = $_POST["stock"];
                $produto->produto_id = (int)$_POST["produto"];
                $produto->save();
                $this->redirectToRoute("load&p=gestaoproduto");
            }
            else
            {
                $this->redirectToRoute(ROTA_LOGIN);
            }
        }
        else
        {
            $this->redirectToRoute(ROTA_LOGIN);
        }
    }

    public function updateProduto()
    {
        if(isset($_POST["id"]) && isset($_POST["referencia"]) && isset($_POST["preco"]) && isset($_POST["desc"]) && isset($_POST["stock"]) && isset($_POST["produto"]))
        {
            $produto = Produto::find_by_id($_POST["id"]);
            $produto->referencia = $_POST["referencia"];
            $produto->preco = $_POST["preco"];
            $produto->descricao = $_POST["desc"];
            $produto->stock = $_POST["stock"];
            $produto->produto_id = (int)$_POST["produto"];
            $produto->save();
            $this->redirectToRoute("load&p=gestaoproduto");
        }
        else
        {
            $this->redirectToRoute(ROTA_LOGIN);
        }
    }

    */
}