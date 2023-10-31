<?php

namespace App\Controller;

use App\Model\VendaModel;
use App\Model\ClienteModel;
use App\Model\FuncionarioModel;
use App\Model\ProdutoModel;
use App\Model\ServicoModel;

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

        $model_servico = new ServicoModel();
        $model_servico->GetAllRows();

        $model_venda = new VendaModel();

        $models = [$model_venda, $model_cliente, $model_funcionario, $model_produto, $model_servico];

        parent::render('Venda/VendaCadastro', $models);
    }

    static public function AddCarrinho()
    {
        $model = new VendaModel();

        $model->id_servico_carrinho = ($_POST['id_servico'] == 'nenhum') ? null : $_POST['id_servico'];
        $model->id_produto_carrinho = ($_POST['id_produto'] == 'nenhum') ? null : $_POST['id_produto'];
        
        $model->quantidade_servico_carrinho = ($model->id_servico_carrinho == null) ? 0 : $_POST['quantidade_servico'];
        $model->quantidade_produto_carrinho = ($model->id_produto_carrinho == null) ? 0 : $_POST['quantidade_produto']; 

        $model->AddCarrinho();

        header('Location: /venda/cadastro');
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