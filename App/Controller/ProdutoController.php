<?php

namespace App\Controller;

use App\Model\ProdutoModel;

class ProdutoController extends Controller
{
    static public function FormAndList()
    {
        parent::IsAuthenticated();

        $model = new ProdutoModel();

        if (isset($_GET['id'])) $model = $model->SearchById((int) $_GET['id']);

        $model = new ProdutoModel();

        $model->GetAllRows();

        parent::render('Produto/ProdutoCadastro', $model);
    }

    static public function Save() 
    {
        parent::IsAuthenticated();

        $model = new ProdutoModel();

        $model->id = $_POST['id'];
        $model->descricao = $_POST['descricao_produto'];
        $model->preco = $_POST['preco_produto'];
        $model->estoque = $_POST['estoque_produto'];

        $model->Save();

        header('Location: /produto/cadastro');
    }

    static public function Delete()
    {
        parent::IsAuthenticated();

        (new ProdutoModel())->Delete((int) $_GET['id']);

        header('Location: /produto/cadastro');
    }
}