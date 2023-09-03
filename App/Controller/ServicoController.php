<?php

namespace App\Controller;

use App\Model\ServicoModel;

class ServicoController extends Controller
{
    static public function Form()
    {
        parent::IsAuthenticated();
        
        parent::render('Servico/ServicoCadastro');
    }

    static public function Save() 
    {
        parent::IsAuthenticated();

        $model = new ServicoModel();

        $model->id = $_POST['id'];
        $model->descricao = $_POST['descricao_servico'];
        $model->data_servico = $_POST['data_servico'];
        $model->id_cliente = $_POST['id_cliente_servico'];

        $model->Save();

        header('Location: /servico/listagem');
    }

    static public function List()
    {
        parent::IsAuthenticated();

        parent::render('Servico/ServicoListagem');
    }

    static public function Delete()
    {
        parent::IsAuthenticated();
    }
}