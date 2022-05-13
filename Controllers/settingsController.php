<?php 
require_once("./models/Auth.php");
require_once("./controllers/BaseController.php");

Class Settings extends Base
{


    public function registerIva(){
        $auth = new Auth();

        $logged = $auth->isLoggedIn();

        if($logged)
        {
            if(isset($_GET["i"])){
                $iva = Iva::find($_GET["i"]);
                echo "gud";
            }else{
                $iva = new Iva();
                echo "not gud";
            }
            

            if(isset($_POST["vigor"]) && isset($_POST["desc"]) && isset($_POST["percentagem"]))
            {
            
                $iva -> percentagem = $_POST["percentagem"];
                $iva -> vigor = $_POST["vigor"];
                $iva -> descricao = $_POST["desc"];

                $iva -> save();
                $this -> redirectToRoute("gestao/iva");


            }

        }
        else
        {
            $this->redirectToRoute(ROTA_LOGIN);
            //header("Location: ./index.php?r=auth/login");
        }
    }

}