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

    public function settings()
    {
        $auth = new Auth();

        $logged = $auth->isLoggedIn();

        if($logged)
        {
            
            $this->renderView("settings");
            //require_once("./views/plano.php");
        }
        else
        {
            $this->redirectToRoute(ROTA_LOGIN);
            //header("Location: ./index.php?r=auth/login");
        }
    }
}
