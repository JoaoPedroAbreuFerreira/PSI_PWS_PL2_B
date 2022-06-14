<?php 
require_once("./models/Auth.php");
require_once("./controllers/BaseController.php");

Class IvaController extends Base{

    public function index(){
        $auth = new Auth();
        $role = $auth->getRole();
        if($role == "cliente" || $role == false){
            $this->redirectToRoute("");
        }else{

        $ivas = Iva::all();
        $this->renderView("gestaoiva", ['ivas' => $ivas]);
        }
    }

    public function show(){
        $auth = new Auth();
        $role = $auth->getRole();
        if($role == "cliente" || $role == false){
            $this->redirectToRoute("");
        }else{
        $this->renderView("registeriva");
        }
    }

    public function create(){
        $auth = new Auth();
        $role = $auth->getRole();
        if($role == "cliente" || $role == false){
            $this->redirectToRoute("");
        }else{
        $iva = new Iva();
        $dados = [
            "percentagem" => $_POST["percentagem"],
            "vigor" => $_POST["vigor"],
            "descricao" => $_POST["desc"]
        ];


        if($iva->verificarDados($dados)){
            $iva::create($dados);
            $this->redirectToRoute("iva/index");

        }else{
            $this->renderView("erro", ["error" => "Erro nos paramentros fornecidos", "route" => "iva/index", "type" => ""]);


        }
    }
        

    }

    public function edit($id){
        $auth = new Auth();
        $role = $auth->getRole();
        if($role == "cliente" || $role == false){
            $this->redirectToRoute("");
        }else{
        $dados = [
            "percentagem" => $_POST["percentagem"],
            "vigor" => $_POST["vigor"],
            "descricao" => $_POST["desc"]
        ];

        $iva = Iva::find_by_id($id);
        if($iva->verificarDados($dados)){
            extract($dados);
            $iva->update_attributes(array("percentagem" => $percentagem, "vigor" => $vigor, "descricao" => $descricao));
            $this->redirectToRoute("iva/index");
        }
        else{
            $this->renderView("erro", ["error" => "Erro nos paramentros fornecidos", "route" => "iva/index", "type" => ""]);
        }
    }
    }

    public function update($id){
        $auth = new Auth();
        $role = $auth->getRole();
        if($role == "cliente" || $role == false){
            $this->redirectToRoute("");
        }else{
        $iva = Iva::find_by_id($id);
        $this->renderView("updateiva", ['iva' => $iva]);
        }
    }

    public function delete($id){
        $auth = new Auth();
        $role = $auth->getRole();
        if($role == "cliente" || $role == false){
            $this->redirectToRoute("");
        }else{

        $iva = Iva::find_by_id($id);

        if($iva->isUsed($id)){
            $iva->delete();
            $this->redirectToRoute("iva/index");
        }

        $this->renderView("erro", ["error" => "Erro Iva não pode ser eliminado pois foi usado no registo de um Produto", "route" => "iva/index", "type" => ""]);
    }

    }
}