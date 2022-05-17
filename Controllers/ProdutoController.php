<?php 
require_once("./models/Auth.php");
require_once("./controllers/BaseController.php");

Class ProdutoController extends Base
{
    public function registerProduto()
    {
        $auth = new Auth();

        if($auth->isLoggedIn())
        {     
            if(isset($_POST["referencia"]) && isset($_POST["preco"]) && isset($_POST["desc"]) && isset($_POST["stock"]) && isset($_POST["iva"]))
            {
                $produto = new Produto();
                $produto->referencia = $_POST["referencia"];
                $produto->preco = $_POST["preco"];
                $produto->descricao = $_POST["desc"];
                $produto->stock = $_POST["stock"];
                $produto->iva_id = (int)$_POST["iva"];
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
        if(isset($_POST["id"]) && isset($_POST["referencia"]) && isset($_POST["preco"]) && isset($_POST["desc"]) && isset($_POST["stock"]) && isset($_POST["iva"]))
        {
            $produto = Produto::find_by_id($_POST["id"]);
            $produto->referencia = $_POST["referencia"];
            $produto->preco = $_POST["preco"];
            $produto->descricao = $_POST["desc"];
            $produto->stock = $_POST["stock"];
            $produto->iva_id = (int)$_POST["iva"];
            $produto->save();
            $this->redirectToRoute("load&p=gestaoproduto");
        }
        else
        {
            $this->redirectToRoute(ROTA_LOGIN);
        }
    }
}