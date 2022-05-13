<?php 
require_once("./models/Auth.php");
require_once("./controllers/BaseController.php");

Class IvaController extends Base{

    public function registerIva(){
        $auth = new Auth();

        $logged = $auth->isLoggedIn();

        if($logged)
        {     

            if(isset($_POST["vigor"]) && isset($_POST["desc"]) && isset($_POST["percentagem"]))
            {
                $iva = new Iva();
                $iva -> percentagem = $_POST["percentagem"];
                $iva -> vigor = $_POST["vigor"];
                $iva -> descricao = $_POST["desc"];

                $iva -> save();
                $this -> redirectToRoute("load&p=gestaoiva");

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

    public function updateIva(){

        if(isset($_POST["vigor"]) && isset($_POST["desc"]) && isset($_POST["percentagem"]) && isset($_POST["id"])){

            $iva = Iva::find($_POST["id"]);
            $iva -> percentagem = $_POST["percentagem"];
            $iva -> vigor = $_POST["vigor"];
            $iva -> descricao = $_POST["desc"];

            $iva -> save();
            $this -> redirectToRoute("load&p=gestaoiva");
        }
        else
        {
            $this->redirectToRoute(ROTA_LOGIN);
            //header("Location: ./index.php?r=auth/login");
        }

    }
}