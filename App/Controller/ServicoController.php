<?php

namespace App\Controller;

use App\Model\ServicoModel;
use App\Model\ClienteModel;
use App\Model\FuncionarioModel;

class ServicoController extends Controller
{
    static public function Form()
    {
        parent::IsAuthenticated();

        $model_cliente = new ClienteModel();
        $model_cliente->GetAllRows();

        $model_funcionario = new FuncionarioModel();
        $model_funcionario->GetAllRows();

        $model_servico = new ServicoModel();

        $models = [$model_servico, $model_cliente, $model_funcionario];
        
        parent::render('Servico/ServicoCadastro', $models);
    }

    static public function Save() 
    {
        parent::IsAuthenticated();

        $model = new ServicoModel();

        $model->id = $_POST['id'];
        $model->descricao = $_POST['descricao_servico'];
        $model->data_servico = $_POST['data_servico'];
        $model->id_cliente = $_POST['id_cliente_servico'];
        $model->id_funcionario = $_POST['id_funcionario_servico'];

        $model->Save();

        header('Location: /servico/listagem');
    }

    static public function List()
    {
        parent::IsAuthenticated();

        $model = new ServicoModel();
        $model->GetAllRows();

        parent::render('Servico/ServicoListagem', $model);
    }

    static public function Delete()
    {
        parent::IsAuthenticated();
    }
}