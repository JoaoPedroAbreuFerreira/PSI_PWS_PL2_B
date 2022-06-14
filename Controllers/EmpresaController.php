<?php 
require_once("./models/Auth.php");
require_once("./controllers/BaseController.php");

Class EmpresaController extends Base
{
    public function index()   
    {
        $auth = new Auth();
        $role = $auth->getRole();
        if($role == "cliente" || $role == false){
            $this->redirectToRoute("");
        }else{
        $empresa = Empresa::first();
        $this->renderView("gestaoempresa", ['empresa' => $empresa]);
        }
    }

    public function edit()
    {
        $auth = new Auth();
        $role = $auth->getRole();
        if($role == "cliente" || $role == false){
            $this->redirectToRoute("");
        }else{

        
        $dados = [
            "designacaosocial" => $_POST["designacaoSocial"],
            "capitalsocial" => $_POST["capitalSocial"],
            "email" => $_POST["email"],
            "telefone" => $_POST["tele"],
            "morada" => $_POST["morada"],
            "localidade" => $_POST["local"],
            "codigopostal" => $_POST["cod"]
        ];

        


        if(isset($_POST["designacaoSocial"]) && isset($_POST["capitalSocial"]) && isset($_POST["email"]) && isset($_POST["tele"]) && isset($_POST["nif"]) && isset($_POST["morada"]) && isset($_POST["local"]) && isset($_POST["cod"]))
        {
                $empresa = Empresa::first();
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
        else
        {
            $this->redirectToRoute(ROTA_LOGIN);
            $this->renderView("erro", ["error" => "Erro nos parametros fornecidos", "route" => "", "type" => ""]);

        }
    }
    }

    public function update()
    {
        $auth = new Auth();
        $role = $auth->getRole();
        if($role == "cliente" || $role == false){
            $this->redirectToRoute("");
        }else{
        $empresa = Empresa::first();
        $this->renderView("updateempresa", ['empresa' => $empresa]);
        }

    }

}