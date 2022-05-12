<?php
require_once("./models/Auth.php");
require_once("./controllers/BaseController.php");

Class AuthController extends Base
{
    public function login()
    {
        $auth = new Auth();

        if($auth->isLoggedIn())
        {
            $this->redirectToRoute("");
        }

        if(isset($_POST["user"]) && isset($_POST["pass"]))
        { 
            $valid = $auth->login($_POST["user"], $_POST["pass"]);
        
            if($valid == false) 
            { 
                echo "Dados Incorretos";
            }
            else
            {
                $this->redirectToRoute("");
            } 
        }

        $this->renderView("login");
    }

    public function logout()
    {
        $auth = new Auth();
        $auth->logout();
        $this->redirectToRoute(ROTA_LOGIN);
    }
}
