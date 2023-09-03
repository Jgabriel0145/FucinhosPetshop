<?php

namespace App\Controller;

use App\Model\ProdutoModel;

class ProdutoController extends Controller
{
    static public function Form()
    {
        parent::IsAuthenticated();

        $model = new ProdutoModel();

        if (isset($_GET['id'])) $model = $model->SearchById((int) $_GET['id']);

        parent::render('Produto/ProdutoCadastro', $model);
    }

    static public function Save() 
    {
        parent::IsAuthenticated();

        $model = new ProdutoModel();

        $model->descricao = $_POST['descricao_produto'];
        $model->preco = $_POST['preco_produto'];
        $model->estoque = $_POST['estoque_produto'];

        $model->Save();

        header('Location: /produto/listagem');
    }

    static public function List()
    {
        parent::IsAuthenticated();

        $model = new ProdutoModel();

        $model->GetAllRows();

        parent::render('Produto/ProdutoListagem', $model);
    }

    static public function Delete()
    {
        parent::IsAuthenticated();

        (new FuncionarioModel())->Delete((int) $_GET['id']);

        header('Location: /produto/listagem');
    }
}