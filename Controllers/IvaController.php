<?php 
require_once("./models/Auth.php");
require_once("./controllers/BaseController.php");

Class IvaController extends Base{

    public function registerIva()
    {
        $auth = new Auth();

        if($auth->isLoggedIn())
        {     
            if(isset($_POST["percentagem"]) && isset($_POST["vigor"]) && isset($_POST["desc"]))
            {
                $iva = new Iva();
                $iva->percentagem = $_POST["percentagem"];
                $iva->vigor = $_POST["vigor"];
                $iva->descricao = $_POST["desc"];

                $iva->save();
                $this->redirectToRoute("load&p=gestaoiva");
            }
            else
            {
                $this->redirectToRoute(ROTA_LOGIN);
            }
        }
        else
        {
            $this->redirectToRoute(ROTA_LOGIN);
        }
    }

    public function updateIva()
    {
        if(isset($_POST["vigor"]) && isset($_POST["desc"]) && isset($_POST["percentagem"]) && isset($_POST["id"]))
        {
            $iva = Iva::find_by_id($_POST["id"]);
            $iva->percentagem = $_POST["percentagem"];
            $iva->vigor = $_POST["vigor"];
            $iva->descricao = $_POST["desc"];

            $iva->save();
            $this->redirectToRoute("load&p=gestaoiva");
        }
        else
        {
            $this->redirectToRoute(ROTA_LOGIN);
        }
    }
}