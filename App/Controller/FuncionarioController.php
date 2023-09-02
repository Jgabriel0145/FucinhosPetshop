<?php

namespace App\Controller;

use App\Model\FuncionarioModel;

class FuncionarioController extends Controller
{
    static public function Form()
    {
        $model = new FuncionarioModel();

        if (isset($_GET['id'])) $model = $model->SearchById((int) $_GET['id']);

        parent::render('Funcionario/FuncionarioCadastro', $model);
    }

    static public function Save()
    {
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
        $model = new FuncionarioModel();

        $model->GetAllRows();

        parent::render('Funcionario/FuncionarioListagem', $model);
    }

    static public function Delete()
    {
        (new FuncionarioModel())->Delete((int) $_GET['id']);

        header('Location: /funcionario/listagem');
    }
}