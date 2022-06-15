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

        if(isset($_POST["vigor"])){
            if($_POST["vigor"] == null || $_POST["vigor"] > 1 || $_POST["vigor"] < 0){
                $vigor = 0;
            }else{
                $vigor = $_POST["vigor"];
            }
        }else{
            $vigor = 0;
        }


        $dados = [
            "percentagem" => $_POST["percentagem"],
            "vigor" => $vigor,
            "descricao" => $_POST["desc"]
        ];

        

        $error = $iva->verificarDados($dados);

        if($error === true){
            $iva::create($dados);
            $this->redirectToRoute("iva/index");

        }else{
            $this->renderView("registeriva", ["error" => $error, "iva" => $dados]);

        }
    }
        

    }

    public function edit($id){
        $auth = new Auth();
        $role = $auth->getRole();
        if($role == "cliente" || $role == false){
            $this->redirectToRoute("");
        }else{

        if(isset($_POST["vigor"])){
            if($_POST["vigor"] == null || $_POST["vigor"] > 1 || $_POST["vigor"] < 0){
                $vigor = 0;
            }else{
                $vigor = $_POST["vigor"];
            }
        }else{
            $vigor = 0;
        }


        $dados = [
            "percentagem" => $_POST["percentagem"],
            "vigor" => $vigor,
            "descricao" => $_POST["desc"]
        ];

        $iva = Iva::find_by_id($id);
        $error = $iva->verificarDados($dados);

      
        if($error === true){
            extract($dados);
            $iva->update_attributes(array("percentagem" => $percentagem, "vigor" => $vigor, "descricao" => $descricao));
            $this->redirectToRoute("iva/index");
        }
        else{
            $this->renderView("updateiva", ["error" => $error, "alteracao" => $dados, "iva" => $iva]);
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
        if($iva == null){
            $this->redirectToRoute("");
        }
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
        if($iva == null){
            $this->renderView("erro", ["error" => "Iva inexistente", "route" => "iva/index", "type" => ""]);
            return;
        }

        if($iva->isUsed($id)){
            $iva->delete();
            $this->redirectToRoute("iva/index");
        }

        $this->renderView("erro", ["error" => "Erro Iva não pode ser eliminado pois foi usado no registo de um Produto", "route" => "iva/index", "type" => ""]);
    }

    }
}