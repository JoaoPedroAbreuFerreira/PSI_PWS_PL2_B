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

        $empresa = Empresa::first();
        $error = $empresa->verificarDados($dados);

        if($error === true)
        {
            extract($dados);
            $empresa->update_attributes(array("designacaosocial" => $designacaosocial, "capitalsocial" => $capitalsocial, "email" => $email,
             "telefone" => $telefone, "morada" => $morada, "localidade" => $localidade, "codigopostal" => $codigopostal));

            $this->redirectToRoute("empresa/index");
        }
        else
        {
            
            $this->renderView("updateempresa", ["error" => $error, "alteracao" => $dados, 'empresa' => $empresa]); 
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