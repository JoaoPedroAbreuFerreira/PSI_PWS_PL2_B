<?php 
require_once("./models/Auth.php");
require_once("./controllers/BaseController.php");

Class UtilizadorController extends Base
{
    public function index()
    {
        $auth = new Auth();

        if($auth->isLoggedIn())
        {  
            
            $user = Utilizador::find_by_username($_SESSION["username"]);
            
            $type = $user->role;
            
            $this->renderView($type);
        }
        else
        {
            $this->redirectToRoute(ROTA_LOGIN);
        }
    }

    public function gestao()
    {
        $funcionarios = Utilizador::all(array('conditions' => 'role = "funcionario"'));
        $this->renderView("gestaofuncionario", ['funcionarios' => $funcionarios]);
    }

    public function show($type)
    {
        if($type == "cliente")
        {
            $this->renderView("registerUser", ['type' => "Cliente"]);
        }
        else if($type == "funcionario")
        {
            $this->renderView("registerUser", ['type' => "Funcionário"]);
        }
        else if($type == "update")
        {
            $this->renderView("updateuser");
        }
        else
        {
            $this->redirectToRoute("");
        }
    }

    public function create($type)
    {
        $user = new Utilizador();

        if($type == "Funcionário")
        {
            $type = "funcionario";
        }
        else
        {
            $type = "cliente";
        }

        $dados = 
        [
            "username" => $_POST["user"],
            "pass" => $_POST["pass"],
            "email" => $_POST["email"],
            "telefone" => $_POST["tele"],
            "nif" => $_POST["nif"],
            "morada" => $_POST["morada"],
            "localidade" => $_POST["local"],
            "codigopostal" => $_POST["cod"],
            "role" => $type
        ];

        if($user->verificarDados($dados))
        {
            $user::create($dados);

            if($type == "funcionario")
            {
                $this->redirectToRoute("user/gestao");
            }
            else
            {
                $this->redirectToRoute("");
            }
        }
        else
        {  
            $this->redirectToRoute("");
        }
    }

    public function edit($id)
    {
        $dados = 
        [
            "username" => $_POST["user"],
            "pass" => $_POST["pass"],
            "email" => $_POST["email"],
            "telefone" => $_POST["tele"],
            "nif" => $_POST["nif"],
            "morada" => $_POST["morada"],
            "localidade" => $_POST["local"],
            "codigopostal" => $_POST["cod"]

        ];

        $user = Utilizador::find_by_id($id);

        if($user->verificarDados($dados))
        {
            extract($dados);
            $user->update_attributes(array("username" => $username, "pass" => $pass, "email" => $email,
             "telefone" => $telefone, "nif" => $nif, "morada" => $morada, "localidade" => $localidade, "codigopostal" => $codigopostal));

            $this->redirectToRoute("user/gestao");
        }
        else
        {
            $this->redirectToRoute("");
        }  
    }

    public function update($id)
    {
        $user = Utilizador::find_by_id($id);
        $this->renderView("updatefuncionario", ['user' => $user]);
    }

    public function change(){
        $auth = new Auth();

        if($auth->isLoggedIn())
        {
            $user = Utilizador::find_by_username($_SESSION["username"]);

            if(isset($_POST["pass"]))
            {
                $user->pass = $_POST["pass"];
            }
    
            if(isset($_POST["email"]))
            {
                $user->email = $_POST["email"];
            }

            $user->save();

            $this->redirectToRoute("auth/logout");
        }
        else
        {
            $this->redirectToRoute("");
        }
    }

    public function delete($id)
    {
        $produto = Produto::find_by_id($id);
        $produto->delete();
        $this->redirectToRoute("produto/index");
    }
}