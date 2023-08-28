<?php

namespace App\Controller;

use App\Model\FuncionarioModel;

class FuncionarioController extends Controller
{
    static public function Form()
    {
        $model = new FuncionarioModel();

        parent::render('Funcionario/FuncionarioCadastro', $model);
    }

    static public function Save()
    {
        $model = new FuncionarioModel();

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

    }

    static public function Delete()
    {

    }
}