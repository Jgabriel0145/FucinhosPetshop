<?php

namespace App\Controller;

use App\Model\ClienteModel;

class ClienteController extends Controller
{
    static public function FormAndList()
    {
        parent::IsAuthenticated();
        
        $model = new ClienteModel();

        if (isset($_GET['id'])) $model = $model->SearchById((int) $_GET['id']);

        $model = new ClienteModel();

        $model->GetAllRows();

        parent::render('Cliente/ClienteCadastro', $model);
    }

    static public function Save() 
    {
        parent::IsAuthenticated();

        $model = new ClienteModel();

        $model->id = $_POST['id'];
        $model->nome = $_POST['nome_cliente'];
        $model->cpf = $_POST['cpf_cliente'];
        $model->telefone = $_POST['telefone_cliente'];
        $model->data_nascimento = $_POST['data_nascimento_cliente'];
        $model->endereco = $_POST['endereco_cliente'];

        $model->Save();

        header('Location: /cliente/cadastro');
    }

    static public function List()
    {
        parent::IsAuthenticated();

        $model = new ClienteModel();

        $model->GetAllRows();

        parent::render('Cliente/ClienteCadastro', $model);
    }

    static public function Delete()
    {
        parent::IsAuthenticated();

        (new ClienteModel())->Delete((int) $_GET['id']);

        header('Location: /cliente/cadastro');
    }
}