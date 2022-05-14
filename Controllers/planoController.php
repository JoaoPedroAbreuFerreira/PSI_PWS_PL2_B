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

    public function load($page)
    {
        $auth = new Auth();

        $logged = $auth->isLoggedIn();
        

        if($logged)
        {
         
            switch($page){
                case "gestaoiva":
                case "updateiva":  
                    $ivas = Iva::all();
                    $this-> renderView($page, ['ivas' => $ivas]);
                    break;
                case "registerproduto":
                case "updateproduto":
                case "gestaoproduto":
                    $ivas = Iva::all();
                    $produtos = Produto::all();
                    $this-> renderView($page, ['ivas' => $ivas, 'produtos' => $produtos]);
                    break;
                default:
                    $this->renderView($page);
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
