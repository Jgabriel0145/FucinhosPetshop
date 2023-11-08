<?php

namespace App\Controller;

use App\Model\{AnimalModel, ClienteModel};

class AnimalController extends Controller
{
    static public function Form()
    {
        parent::IsAuthenticated();

        $model_animal = new AnimalModel();
        $model_cliente = new ClienteModel();

        if (isset($_GET['id'])) $model_animal = $model_animal->SearchById((int) $_GET['id']);

        $model_cliente->rows = $model_cliente->GetAllRows();

        $models = [$model_animal, $model_cliente];

        parent::render('Animal/AnimalCadastro', $models);
    }

    static public function Save() 
    {
        parent::IsAuthenticated();

        $model = new AnimalModel();

        $model->id = $_POST['id'];
        $model->nome = $_POST['nome_animal'];
        $model->raca = $_POST['raca_animal'];
        $model->peso = $_POST['peso_animal'];
        $model->porte = $_POST['porte_animal'];
        $model->id_cliente = $_POST['id_cliente_animal'];

        $model->Save();

        header('Location: /animal/cadastro');
    }

    static public function List()
    {
        parent::IsAuthenticated();

        $model = new AnimalModel();

        $model->GetAllRows();

        parent::render('Animal/AnimalCadastro', $model);
    }

    static public function Delete()
    {
        parent::IsAuthenticated();
        
        (new AnimalModel())->Delete((int) $_GET['id']);

        header('Location: /animal/cadastro');
    }
}