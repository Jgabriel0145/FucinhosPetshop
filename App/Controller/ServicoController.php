<?php

namespace App\Controller;

use App\Model\ServicoModel;

class ServicoController extends Controller
{
    static public function FormAndList()
    {
        parent::IsAuthenticated();

        $model = new ServicoModel();

        if (isset($_GET['id']))
        {
            $model = $model->SearchById((int) $_GET['id']);
        }

        $model = new ServicoModel();
        $model->GetAllRows();

                
        parent::render('Servico/ServicoCadastro', $model);
    }

    static public function Save() 
    {
        parent::IsAuthenticated();

        $model = new ServicoModel();

        $model->id = $_POST['id'];
        $model->descricao = $_POST['descricao_servico'];
        $model->valor_pequeno_porte = $_POST['valor_pequeno_porte'];
        $model->valor_medio_porte = $_POST['valor_medio_porte'];
        $model->valor_grande_porte = $_POST['valor_grande_porte'];

        $model->Save();

        header('Location: /servico/cadastro');
    }

    static public function Delete()
    {
        parent::IsAuthenticated();
    }
}