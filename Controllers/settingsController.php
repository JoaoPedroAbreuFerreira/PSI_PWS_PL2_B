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
            if(isset($_POST["user"])){
                $user -> username = $_POST["user"];
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

}