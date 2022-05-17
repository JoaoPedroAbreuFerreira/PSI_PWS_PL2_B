<?php 
require_once("./models/Auth.php");
require_once("./controllers/BaseController.php");

Class EmpresaController extends Base
{
   
    public function registerEmpresa()
    {
        $auth = new Auth();

        if($auth->isLoggedIn())
        {
            if(isset($_POST["designacaoSocial"]) && isset($_POST["capitalSocial"]) && isset($_POST["email"]) && isset($_POST["tele"]) && isset($_POST["nif"]) && isset($_POST["morada"]) && isset($_POST["local"]) && isset($_POST["cod"]))
            {
                $empresa = new Empresa();
                $empresa->designacaosocial = $_POST["designacaoSocial"];
                $empresa->capitalsocial = $_POST["capitalSocial"];
                $empresa->email = $_POST["email"];
                $empresa->telefone = $_POST["tele"];
                $empresa->nif = $_POST["nif"];
                $empresa->morada = $_POST["morada"];
                $empresa->localidade = $_POST["local"];
                $empresa->codigopostal = $_POST["cod"];

                $empresa->save();
                $this->redirectToRoute(ROTA_LOGIN);
            }
        }
        else
        {
            $this->redirectToRoute(ROTA_LOGIN);
        }
    }
}