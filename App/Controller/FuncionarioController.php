<?php

namespace App\Controller;

use App\Model\FuncionarioModel;

class FuncionarioController extends Controller
{
    static public function Form()
    {
        parent::IsAuthenticated();
        parent::IsAdmin();

        $model = new FuncionarioModel();

        if (isset($_GET['id'])) $model = $model->SearchById((int) $_GET['id']);

        parent::render('Funcionario/FuncionarioCadastro', $model);
    }

    static public function Save()
    {
        parent::IsAuthenticated();
        parent::IsAdmin();
        
        $model = new FuncionarioModel();

        $model->id = $_POST['id'];
        $model->nome = $_POST['nome_cadastro'];
        $model->cpf = $_POST['cpf_cadastro'];
        $model->email = $_POST['email_cadastro'];
        $model->senha = $_POST['senha_cadastro'];
        
        if ($_POST['admin_cadastro'] == true)
            $model->admin = 1;
        else 
            $model->admin = 0;

        $model->Save();
        
        header('Location: /funcionario/listagem');
    }

    static public function List()
    {
        parent::IsAuthenticated();
        parent::IsAdmin();

        $model = new FuncionarioModel();

        $model->GetAllRows();

        parent::render('Funcionario/FuncionarioListagem', $model);
    }

    static public function Delete()
    {
        parent::IsAuthenticated();
        parent::IsAdmin();

        (new FuncionarioModel())->Delete((int) $_GET['id']);

        header('Location: /funcionario/listagem');
    }



    //Login
    static public function Login()
    {
        parent::render('Login/Login');
    }

    static public function Auth()
    {
        $model = new FuncionarioModel();

        $model->email = $_POST['email_login'];
        $model->senha = $_POST['senha_login'];

        $usuario = $model->Autenticar();

        if ($usuario != null)
        {
            $array_dados = [ 
                'id' => $usuario->id,
                'nome' => $usuario->nome,
                'cpf' => $usuario->cpf,
                'email' => $usuario->email,
                'senha' => $usuario->senha,
                'admin' => $usuario->admin
            ];

            $_SESSION['dados_usuario'] = $array_dados;

            header('Location: /inicio');
        }
        else header('Location: /funcionario/login?erro=true');
    }

    static public function Logout()
    {
        unset($_SESSION['dados_usuario']);
        
        parent::IsAuthenticated();
    }
}