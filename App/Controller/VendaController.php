<?php

namespace App\Controller;

use App\Model\VendaModel;
use App\Model\ClienteModel;
use App\Model\FuncionarioModel;
use App\Model\ProdutoModel;

class VendaController extends Controller
{
    static public function Form()
    {
        parent::IsAuthenticated();

        $model_cliente = new ClienteModel();
        $model_cliente->GetAllRows();

        $model_funcionario = new FuncionarioModel();
        $model_funcionario->GetAllRows();

        $model_produto = new ProdutoModel();
        $model_produto->GetAllRows();

        $model_venda = new VendaModel();

        $models = [$model_venda, $model_cliente, $model_funcionario, $model_produto];

        parent::render('Venda/VendaCadastro', $models);
    }

    static public function AddCarrinho()
    {

    }

    static public function VerCarrinho()
    {

    }

    static public function Save() 
    {
        parent::IsAuthenticated();

        $model = new VendaModel();

        $model->id = $_POST['id'];
        $model->id_cliente = $_POST['id_cliente_venda'];
        $model->id_funcionario = $_POST['id_funcionario_venda'];

        $model->Save();
    }

    static public function List()
    {
        parent::IsAuthenticated();

        parent::render('Venda/VendaListagem');
    }

    static public function Delete()
    {
        parent::IsAuthenticated();


    }
}