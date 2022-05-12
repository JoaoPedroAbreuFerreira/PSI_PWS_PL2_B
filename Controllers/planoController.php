<?php 
require_once("./models/Auth.php");
require_once("./controllers/BaseController.php");

Class Plano extends Base
{
    public function index()
    {
        $auth = new Auth();

        $logged = $auth->isLoggedIn();

        if($logged)
        {
            
            $user = Utilizador::find_by_username($_SESSION["username"]);
            
            $type = $user -> role;
            $this->renderView($type);
            //require_once("./views/plano.php");
        }
        else
        {
            $this->redirectToRoute(ROTA_LOGIN);
            //header("Location: ./index.php?r=auth/login");
        }
    }

    public function load($type)
    {
        $auth = new Auth();

        $logged = $auth->isLoggedIn();
        
        if(isset($_GET["t"])){
            $table = $_GET["t"];
        }

        if($logged)
        {
         
            switch($type){
                case "settings":
                    $this->renderView($type);
                    break;
                case "register":
                    $this-> renderView($type.$table);
                    break;
                case "iva":
                    $ivas = Iva::all();
                    $this-> renderView("gestao".$type, ['ivas' => $ivas]);
                    break;
                
                default:
                    $this->redirectToRoute(ROTA_LOGIN);
                    break;
            }
            ;
            //require_once("./views/plano.php");
        }
        else
        {
            $this->redirectToRoute(ROTA_LOGIN);
            //header("Location: ./index.php?r=auth/login");
        }
    }
}
