<?php 
require_once("./models/Auth.php");
require_once("./controllers/BaseController.php");

Class UtilizadorController extends Base
{
    public function changeAcc()
    {
        $auth = new Auth();

        if($auth->isLoggedIn())
        {
            $user = Utilizador::find_by_username($_SESSION["username"]);

            if(isset($_POST["pass"]))
            {
                $user->pass = $_POST["pass"];
            }
    
            if(isset($_POST["email"]))
            {
                $user->email = $_POST["email"];
            }

            $user->save();

            $this->redirectToRoute("auth/logout");
        }
        else
        {
            $this->redirectToRoute(ROTA_LOGIN);
        }
    }

    public function clienteRegister()
    {
        $auth = new Auth();

        if($auth->isLoggedIn())
        {
            if(isset($_POST["user"]) && isset($_POST["pass"]) && isset($_POST["email"]) && isset($_POST["tele"]) && isset($_POST["nif"]) && isset($_POST["morada"]) && isset($_POST["local"]) && isset($_POST["cod"]))
            {
                $user = new Utilizador();
                $user->username = $_POST["user"];
                $user->pass = $_POST["pass"];
                $user->email = $_POST["email"];
                $user->telefone = $_POST["tele"];
                $user->nif = $_POST["tele"];
                $user->morada = $_POST["morada"];
                $user->localidade = $_POST["local"];
                $user->codigopostal = $_POST["cod"];
                $user->role = 'C';

                $user->save();
                $this->redirectToRoute(ROTA_LOGIN);
            }
        }
        else
        {
            $this->redirectToRoute(ROTA_LOGIN);
        }
    }

    public function funcionarioRegister()
    {
        $auth = new Auth();

        if($auth->isLoggedIn())
        {
            if(isset($_POST["user"]) && isset($_POST["pass"]) && isset($_POST["email"]) && isset($_POST["tele"]) && isset($_POST["nif"]) && isset($_POST["morada"]) && isset($_POST["local"]) && isset($_POST["cod"]))
            {
                $user = new Utilizador();
                $user->username = $_POST["user"];
                $user->pass = $_POST["pass"];
                $user->email = $_POST["email"];
                $user->telefone = $_POST["tele"];
                $user->nif = $_POST["tele"];
                $user->morada = $_POST["morada"];
                $user->localidade = $_POST["local"];
                $user->codigopostal = $_POST["cod"];
                $user->role = 'F';

                $user->save();
                $this->redirectToRoute(ROTA_LOGIN);
            }
        }
        else
        {
            $this->redirectToRoute(ROTA_LOGIN);
        }
    }
}