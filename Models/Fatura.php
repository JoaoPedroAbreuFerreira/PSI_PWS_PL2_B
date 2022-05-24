<?php
Class Fatura extends ActiveRecord\Model
{
    static $table_name = 'fatura';

    public function verificarDados($dados)
    {
        if(isset($dados))
        {
            extract($dados);
            if(empty($utilizador_id) || empty($cliente_id) ||empty($valorTotal) || empty($ivaTotal))
            {
                return false;
            }
        }
        return true;
    }

    public static function changeEstado($id)
    {
        $fatura = Fatura::find_by_id($id);

        if($fatura)
        {
            $fatura->update_attributes(array("estado" => "Emitida"));
        }
    }

    public function getRole($username)
    {
        $auth = new Auth();

        if($username == $_SESSION["username"])
        {
            $user = Utilizador::find_by_username($username);
            return $user->role;
        }

        return false;

    }

    public function verificarProdutosClientes(){
        $produtos = Produto::all();
        $clientes = Utilizador::all(array('conditions' => 'role = "cliente"'));
        if(empty($produtos)){
            return "produto";
        }else if(empty($clientes)){
            return "user";
        }else{
            return true;
        }
        
    }
}