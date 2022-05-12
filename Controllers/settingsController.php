<?php 
require_once("./models/Auth.php");
require_once("./controllers/BaseController.php");

Class Settings extends Base
{

    public function changeAcc(){

        $auth = new Auth();

        $logged = $auth->isLoggedIn();

        if($logged)
        {
            
            $user = Utilizador::find_by_username($_SESSION["username"]);
            if(isset($_POST["email"])){
                $user -> email = $_POST["email"];
            }
    
            if(isset($_POST["pass"])){
                $user -> pass = $_POST["pass"];
            }
            $user -> save();

            $this-> redirectToRoute("auth/logout");

        }
        else
        {
            $this->redirectToRoute(ROTA_LOGIN);
            //header("Location: ./index.php?r=auth/login");
        }
        
        
    }

    public function clienteRegister(){
        $auth = new Auth();

        $logged = $auth->isLoggedIn();

        if($logged)
        {
            if(isset($_POST["user"]) && isset($_POST["pass"]) && isset($_POST["email"]) && isset($_POST["tele"]) && isset($_POST["nif"]) && isset($_POST["morada"]) && isset($_POST["local"]) && isset($_POST["cod"]))
            {
                $user = new Utilizador();
                $user -> username = $_POST["user"];
                $user -> pass = $_POST["pass"];
                $user -> email = $_POST["email"];
                $user -> telefone = $_POST["tele"];
                $user -> nif = $_POST["tele"];
                $user -> morada = $_POST["morada"];
                $user -> localidade = $_POST["local"];
                $user -> codigopostal = $_POST["cod"];
                $user -> role = 'C';

                $user ->save();

                $this -> redirectToRoute(ROTA_LOGIN);

            }

        }
        else
        {
            $this->redirectToRoute(ROTA_LOGIN);
            //header("Location: ./index.php?r=auth/login");
        }
    }

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