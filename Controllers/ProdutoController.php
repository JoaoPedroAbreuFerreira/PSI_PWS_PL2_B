<?php 
require_once("./models/Auth.php");
require_once("./controllers/BaseController.php");

Class ProdutoController extends Base
{
    
    public function index(){
        $auth = new Auth();
        $role = $auth->getRole();
        if($role == "cliente" || $role == false){
            $this->redirectToRoute("");
        }else{
        $produto = new Produto();
        if($produto->verificarIvas()){
            $produtos = Produto::all();
            $this->renderView("gestaoproduto", ['produtos' => $produtos]);
        }
        else{
            $this->renderView("erro", ["error" => "Erro não existem ivas registados ou Ativos", "route" => "iva/index", "type" => ""]);
            
        }
    }
        

    }

    public function show(){
        $auth = new Auth();
        $role = $auth->getRole();
        if($role == "cliente" || $role == false){
            $this->redirectToRoute("");
        }else{
        $produto = new Produto();
        if($produto->verificarIvas()){
            $ivas = Iva::all(array('conditions' => 'vigor = 1'));
            $this->renderView("registerproduto", ['ivas' => $ivas]);       
        }
        else{
            $this->renderView("erro", ["error" => "Erro não existem ivas registados", "route" => "iva/index", "type" => ""]);
            //echo "Registe um iva primeiro!!";
        }
    }
    }

    public function create(){
        $auth = new Auth();
        $role = $auth->getRole();
        if($role == "cliente" || $role == false){
            $this->redirectToRoute("");
        }else{

        $produto = new Produto();

        if(isset($_POST["iva"])){
            if($_POST["iva"] == null || $_POST["iva"] < 0){
                $iva_id = 0;
            }else{
                $iva_id = $_POST["iva"];
            }
        }else{
            $iva_id = 0;
        }

        $dados = [
            "iva_id" => $iva_id,
            "referencia" => $_POST["referencia"],
            "preco" => $_POST["preco"],
            "descricao" => $_POST["desc"],
            "stock" => $_POST["stock"]
        ];

        $error = $produto->verificarDados($dados);
        
        if($error === true){
            $produto::create($dados);
            $this->redirectToRoute("produto/index");

        }else{
            $ivas = Iva::all(array('conditions' => 'vigor = 1'));

            $this->renderView("registerproduto", ["error" => $error, "alteracao" => $dados, "ivas" => $ivas]);
            

        }
        
    }
    }

    public function edit($id){
        $auth = new Auth();
        $role = $auth->getRole();
        if($role == "cliente" || $role == false){
            $this->redirectToRoute("");
        }else{


            if(isset($_POST["iva"])){
                if($_POST["iva"] == null || $_POST["iva"] < 0){
                    $iva_id = 0;
                }else{
                    $iva_id = $_POST["iva"];
                }
            }else{
                $iva_id = 0;
            }

            $dados = [
                "iva_id" => $iva_id,
                "referencia" => $_POST["referencia"],
                "preco" => $_POST["preco"],
                "descricao" => $_POST["desc"],
                "stock" => $_POST["stock"]
            ];

        $produto = Produto::find_by_id($id);
            $error = $produto->verificarDados($dados);

        if($error === true){
            extract($dados);
            $produto->update_attributes(array("referencia" => $referencia, "iva_id" => $iva_id, "descricao" => $descricao, "stock" => $stock, "preco" => $preco));
            $this->redirectToRoute("produto/index");
        }
        else{
            $ivas = Iva::all(array('conditions' => 'vigor = 1'));

            $this->renderView("updateproduto", ["error" => $error, "alteracao" => $dados, "ivas" => $ivas, "produto" => $produto]);

        }
    }
        
    }

    public function update($id){
        $auth = new Auth();
        $role = $auth->getRole();
        if($role == "cliente" || $role == false){
            $this->redirectToRoute("");
        }else{
        $produto = Produto::find_by_id($id);
        $ivas = Iva::all();
        $this->renderView("updateproduto", ['produto' => $produto, "ivas" => $ivas]);
        }

    }

    public function delete($id){
        $auth = new Auth();
        $role = $auth->getRole();
        if($role == "cliente" || $role == false){
            $this->redirectToRoute("");
        }else{
        $produto = Produto::find_by_id($id);

        if($produto  == null){
            $this->renderView("erro", ["error" => "Produto inexistente", "route" => "produto/index", "type" => ""]);
            return;
        }

        if($produto->isUsed($id)){
            $produto->delete();
            $this->redirectToRoute("produto/index");
        }
    
        $this->renderView("erro", ["error" => "Erro produto não pode ser eliminado pois foi usado no registo de uma fatura", "route" => "produto/index", "type" => ""]);


    }
}
}