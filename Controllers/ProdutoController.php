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
            $this->renderView("erro", ["error" => "Erro não existem ivas registados", "route" => "iva/index", "type" => ""]);
            
            //echo "Registe um iva primeiro!!";
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
            $ivas = Iva::all();
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

        $dados = [
            "iva_id" => (int)$_POST["iva"],
            "referencia" => $_POST["referencia"],
            "preco" => $_POST["preco"],
            "descricao" => $_POST["desc"],
            "stock" => $_POST["stock"]
        ];

        if($produto->verificarDados($dados)){
            $produto::create($dados);
            $this->redirectToRoute("produto/index");

        }else{
            $this->renderView("erro", ["error" => "Erro nos paramentros fornecidos", "route" => "produto/show", "type" => ""]);
            

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
            'iva_id' => (int)$_POST["iva"],
            "referencia" => $_POST["referencia"],
            "preco" => $_POST["preco"],
            "descricao" => $_POST["desc"],
            "stock" => $_POST["stock"]
        ];

        $produto = Produto::find_by_id($id);
        if($produto->verificarDados($dados)){
            extract($dados);
            $produto->update_attributes(array("referencia" => $referencia, "iva_id" => $iva_id, "descricao" => $descricao, "stock" => $stock, "preco" => $preco));
            $this->redirectToRoute("produto/index");
        }
        else{
            $this->renderView("erro", ["error" => "Erro nos paramentros fornecidos", "route" => "produto/index", "type" => ""]);

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

        if($produto->isUsed($id)){
            $produto->delete();
            $this->redirectToRoute("produto/index");
        }
    
        $this->renderView("erro", ["error" => "Erro produto não pode ser eliminado pois foi usado no registo de uma fatura", "route" => "produto/index", "type" => ""]);


    }
}
}