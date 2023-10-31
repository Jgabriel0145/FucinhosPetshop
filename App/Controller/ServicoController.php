<?php

namespace App\Controller;

use App\Model\ServicoModel;

class ServicoController extends Controller
{
    static public function Form()
    {
        parent::IsAuthenticated();

        $model = new ServicoModel();

        if (isset($_GET['id']))
        {
            $model = $model->SearchById((int) $_GET['id']);
        }
                
        parent::render('Servico/ServicoCadastro', $model);
    }

    static public function Save() 
    {
        parent::IsAuthenticated();

        $model = new ServicoModel();

        $model->id = $_POST['id'];
        $model->descricao = $_POST['descricao_servico'];
        $model->valor_servico = $_POST['valor_servico'];

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