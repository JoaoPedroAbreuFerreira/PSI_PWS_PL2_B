<?php 
require_once("./models/Auth.php");
require_once("./controllers/BaseController.php");

Class IvaController extends Base{

    public function index(){
        $ivas = Iva::all();
        $this->renderView("gestaoiva", ['ivas' => $ivas]);
    }

    public function show(){
        $this->renderView("registeriva");
    }

    public function create(){
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

    public function edit($id){
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

    public function update($id){
        $iva = Iva::find_by_id($id);
        $this->renderView("updateiva", ['iva' => $iva]);

    }

    public function delete($id){

        $iva = Iva::find_by_id($id);

        if($iva->isUsed($id)){
            $this->renderView("erro", ["error" => "Erro Iva foi usado no registo de um Produto", "route" => "iva/index", "type" => ""]);
        }
        $iva->delete();
        $this->redirectToRoute("iva/index");


    }
}