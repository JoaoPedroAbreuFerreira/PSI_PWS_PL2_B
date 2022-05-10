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
            $this->renderView("plano");
            //require_once("./views/plano.php");
        }
        else
        {
            $this->redirectToRoute(ROTA_LOGIN);
            //header("Location: ./index.php?r=auth/login");
        }
    }
}
