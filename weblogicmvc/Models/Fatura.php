<?php
Class Fatura extends ActiveRecord\Model
{
    static $table_name = 'fatura';

    public function verificarDados($dados)
    {
        if(isset($dados))
        {
            extract($dados);
            $cliente = Utilizador::find_by_id($cliente_id);
            if(empty($utilizador_id) || empty($cliente_id) || empty($valorTotal) || empty($ivaTotal))
            {
                return "Preencha todos os campos";
            }
            if(trim($utilizador_id) == "" || trim($cliente_id) == "" || trim($valorTotal) == "" || trim($ivaTotal) == "")
            {
                return "Preencha todos os campos";
            }
            if($cliente == null)
            {
                return "Cliente inválido";
            }
            if($cliente->role != "cliente")
            {
                return "Cliente inválido";
            }
            if($valorTotal < 0 || $valorTotal > 99999999 || !is_numeric($valorTotal))
            {
                return "Valor inválido";
            }
            if($ivaTotal < 0 || $ivaTotal > 99999999 || !is_numeric($ivaTotal))
            {
                return "Valor total do iva inválido";
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

    public function verificarProdutosClientes()
    {
        $produtos = Produto::all();
        $clientes = Utilizador::all(array('conditions' => 'role = "cliente"'));
        if(empty($produtos))
        {
            return "produto";
        }
        else if(empty($clientes))
        {
            return "user";
        }
        else
        {
            return true;
        }
        
    }

    public function verificarTotal($valor)
    {
        if((int)$valor > 0)
        {
            return true;
        }
        return false;
    }
}