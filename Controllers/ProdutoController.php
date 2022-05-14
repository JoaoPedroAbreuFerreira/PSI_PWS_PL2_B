<?php 
require_once("./models/Auth.php");
require_once("./controllers/BaseController.php");

Class ProdutoController extends Base{

    public function registerProduto(){
        $auth = new Auth();

        $logged = $auth->isLoggedIn();

        if($logged)
        {     

            if(isset($_POST["referencia"]) && isset($_POST["desc"]) && isset($_POST["preco"]) && isset($_POST["stock"]) && isset($_POST["iva"]))
            {
                $produto = new Produto();
                $produto -> referencia = $_POST["referencia"];
                $produto -> preco = $_POST["preco"];
                $produto -> descricao = $_POST["desc"];
                $produto -> stock = $_POST["stock"];
                $produto -> iva_id = $_POST["iva"];
                $produto -> save();
                $this -> redirectToRoute("load&p=gestaoproduto");

            }
            else
            {
            $this->redirectToRoute(ROTA_LOGIN);
            //header("Location: ./index.php?r=auth/login");
            }

        }
        else
        {
            $this->redirectToRoute(ROTA_LOGIN);
            //header("Location: ./index.php?r=auth/login");
        }
    }

    public function updateProduto(){

        if(isset($_POST["referencia"]) && isset($_POST["desc"]) && isset($_POST["preco"]) && isset($_POST["stock"]) && isset($_POST["iva"]) && isset($_POST["id"])){

            $produto = Produto::find($_POST["id"]);
            $produto -> referencia = $_POST["referencia"];
            $produto -> preco = $_POST["preco"];
            $produto -> descricao = $_POST["desc"];
            $produto -> stock = $_POST["stock"];
            $produto -> iva_id = $_POST["iva"];
            $produto -> save();
            $this -> redirectToRoute("load&p=gestaoproduto");
        }
        else
        {
            $this->redirectToRoute(ROTA_LOGIN);
            //header("Location: ./index.php?r=auth/login");
        }

    }
}