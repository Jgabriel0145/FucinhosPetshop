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

        $model->tipo_venda_carrinho = $_POST['tipo_venda'];

        $model->id_servico_carrinho = ($_POST['id_servico'] == 'nenhum') ? null : $_POST['id_servico'];
        $model->id_produto_carrinho = ($_POST['id_produto'] == 'nenhum') ? null : $_POST['id_produto'];
        
        $model->quantidade_servico_carrinho = ($model->id_servico_carrinho == null) ? 0 : $_POST['quantidade_servico'];
        $model->quantidade_produto_carrinho = ($model->id_produto_carrinho == null) ? 0 : $_POST['quantidade_produto']; 

        $model->AddCarrinho();

        header('Location: /venda/cadastro');
    }

    static public function VerCarrinho()
    {
        $model = new VendaModel();
        $model->CarrinhoGetAllRows();

        $carrinho['produtos'] = [];
        $carrinho['servicos'] = [];

        foreach ($model->rows[0] as $item)
        {
            array_push($carrinho['produtos'], [$item->id, $item->produto, $item->quantidade_produto, $item->valor_un_produto, $item->valor_total]);  
        }

        foreach ($model->rows[1] as $item)
        {
            array_push($carrinho['servicos'], [$item->id, $item->servico, $item->quantidade_servico, $item->valor_un_servico, $item->valor_total]);
        }

        /*foreach($carrinho['produtos'] as $item)
        {
            echo 'ID: ' . $item[0];
            echo '<br>Produto: ' . $item[1];
            echo '<br>Quantidade:' . $item[2];
            echo '<br>Valor Unitário: R$ ' . $item[3];
            echo '<br>Valor Total: R$ ' . $item[4];
            echo '<br><br>';
        }

        foreach($carrinho['servicos'] as $item)
        {
            echo 'ID: ' . $item[0];
            echo '<br>Serviço: ' . $item[1];
            echo '<br>Quantidade:' . $item[2];
            echo '<br>Valor Unitário: R$ ' . $item[3];
            echo '<br>Valor Total: R$ ' . $item[4];
            echo '<br><br>';
        }*/

        /*$model_produto = new ProdutoModel();
        $model_produto->GetAllRows();

        $model_servico = new ServicoModel();
        $model_servico->GetAllRows();

        $models = [$model_venda, $model_produto, $model_servico];*/

        parent::render('Venda/VendaCarrinho', $carrinho);
    }

    static public function Save() 
    {
        parent::IsAuthenticated();
        
        /*$model = new VendaModel();

        $model->id = $_POST['id'];
        $model->id_cliente = $_POST['id_cliente_venda'];
        $model->id_funcionario = $_POST['id_funcionario_venda'];

        $model->Save();*/
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