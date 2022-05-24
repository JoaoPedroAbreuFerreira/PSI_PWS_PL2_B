<?php 
require_once("./models/Auth.php");
require_once("./controllers/BaseController.php");

Class ProdutoController extends Base
{
    
    public function index(){
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

    public function show(){
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

    public function create(){
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

    public function edit($id){
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

    public function update($id){
        $produto = Produto::find_by_id($id);
        $ivas = Iva::all();
        $this->renderView("updateproduto", ['produto' => $produto, "ivas" => $ivas]);

    }

    public function delete($id){

        $produto = Produto::find_by_id($id);
        $produto->delete();
        $this->redirectToRoute("produto/index");


    }

}