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
            $this->redirectToRoute("user/index");
        }

        if(isset($_POST["user"]) && isset($_POST["pass"]))
        { 
            $valid = $auth->login($_POST["user"], hash("sha256", $_POST["pass"]));
        
            if($valid == false) 
            { 
                echo "<h5 style=color:red;text-align:center>Dados Incorretos</h5>";
            }
            else
            {
                $this->redirectToRoute("user/index");
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
