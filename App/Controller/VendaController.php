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
        $model->porte_animal = ($_POST['porte_animal'] == 'nenhum') ? null : $_POST['porte_animal'];

        $model->AddCarrinho();

        header('Location: /venda/cadastro');
    }

    static public function VerCarrinho()
    {
        $model = new VendaModel();
        $model->CarrinhoGetAllRows();

        $carrinho['produtos'] = [];
        $carrinho['servicos'] = [];
        $carrinho['total'] = 0;

        foreach ($model->rows[0] as $item)
        {
            array_push($carrinho['produtos'], [$item->id, $item->produto, $item->quantidade_produto, $item->valor_un_produto, $item->valor_total, $item->produto_id]); 
            $carrinho['total'] += $item->valor_total; 
        }

        foreach ($model->rows[1] as $item)
        {
            array_push($carrinho['servicos'], [$item->id, $item->servico, $item->porte_animal ,$item->quantidade_servico, $item->valor_servico, $item->valor_total, $item->servico_id]);
            $carrinho['total'] += $item->valor_total;
        }

        $model_cliente = new ClienteModel();
        $model_cliente->GetAllRows();

        $model_funcionario = new FuncionarioModel();
        $model_funcionario->GetAllRows();

        $models = [$carrinho, $model_cliente, $model_funcionario];

        parent::render('Venda/VendaCarrinho', $models);
    }

    static public function Save() 
    {
        parent::IsAuthenticated();

        $model = new VendaModel();

        $model->CarrinhoGetAllRows();

        $carrinho['produtos'] = [];
        $carrinho['servicos'] = [];
        $carrinho['total'] = 0;

        foreach ($model->rows[0] as $item)
        {
            array_push($carrinho['produtos'], [$item->id, $item->produto, $item->quantidade_produto, $item->valor_un_produto, $item->valor_total, $item->produto_id]); 
            $carrinho['total'] += $item->valor_total; 
        }

        foreach ($model->rows[1] as $item)
        {
            array_push($carrinho['servicos'], [$item->id, $item->servico, $item->porte_animal, $item->quantidade_servico, $item->valor_servico, $item->valor_total, $item->servico_id]);
            $carrinho['total'] += $item->valor_total;
        }


        $model->id_cliente = $_POST['id_cliente'];
        $model->id_funcionario = $_POST['id_funcionario'];
        $model->valor_total_venda = $carrinho['total'];

        $model->Save($carrinho, $model);
        $model->LimparCarrinho();
        
        header('Location: /venda/listagem');
    }

    static public function List()
    {
        parent::IsAuthenticated();

        $model = new VendaModel();
        $model->GetAllRows();

        parent::render('Venda/VendaListagem', $model);
    }

    static public function VerItensList()
    {
        parent::IsAuthenticated();

        $model = new VendaModel();
        $model->rows = $model->VerItensList($_POST['id_procurar_itens']);

        $listagem['produtos'] = [];
        $listagem['servicos'] = [];
        $listagem['total'] = 0;

        foreach ($model->rows['produtos'] as $item)
        {
            array_push($listagem['produtos'], [$item->id, $item->numero_venda, $item->produto, $item->quantidade_produto, $item->valor_total_produto, $item->cliente, $item->funcionario, $item->data_venda]); 
            $listagem['total'] += $item->valor_total_produto;
        }

        foreach ($model->rows['servicos'] as $item)
        {
            array_push($listagem['servicos'], [$item->id, $item->numero_venda, $item->servico, $item->quantidade_servico, $item->valor_total_servico, $item->cliente, $item->funcionario, $item->data_venda]); 
            $listagem['total'] += $item->valor_total_servico;
        }

        parent::render('Venda/VerItensListagem', $listagem);
    }

    static public function Delete()
    {
        parent::IsAuthenticated();


    }
}