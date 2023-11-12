<?php

namespace App\Model;

use App\DAO\VendaDAO;

class VendaModel extends Model
{
    //venda
    public $id, $data_venda, $id_cliente, $id_funcionario, $valor_total_venda;

    //carrinho
    public $id_carrinho, $tipo_venda_carrinho, $id_servico_carrinho, $id_produto_carrinho;
    public $quantidade_produto_carrinho, $quantidade_servico_carrinho;
    public $valor_un_produto_carrinho, $valor_servico_carrinho, $valor_total_carrinho;
    public $porte_animal;

    public function Save($carrinho, VendaModel $model)
    {
        (new VendaDAO())->Insert($carrinho, $model);
    }

    public function GetAllRows()
    {
        return $this->rows = (new VendaDAO())->Select();
    }

    public function CarrinhoGetAllRows()
    {
        return $this->rows = (new VendaDAO())->SelectCarrinho();
    }

    public function Delete($id)
    {
        (new VendaDAO())->Delete($id);
    }

    public function AddCarrinho()
    {
        $produto = new ProdutoModel();
        if ($this->id_produto_carrinho != null)
        {
            $produto = $produto->SearchById($this->id_produto_carrinho);
            $this->valor_un_produto_carrinho = $produto->preco;
        }
        else $this->valor_un_produto_carrinho = 0;

        $servico = new ServicoModel();
        if ($this->id_servico_carrinho != null)
        {
            $servico = $servico->SearchById($this->id_servico_carrinho);
            if ($this->porte_animal == 'P')
                $this->valor_servico_carrinho = $servico->valor_pequeno_porte;
            else if ($this->porte_animal == 'M')
                $this->valor_servico_carrinho = $servico->valor_medio_porte;
            elseif ($this->porte_animal == 'G')
                $this->valor_servico_carrinho = $servico->valor_grande_porte;
        }
            
        else $servico->valor_servico = 0;

        $this->valor_total_carrinho = ($this->valor_un_produto_carrinho * $this->quantidade_produto_carrinho) + ($this->valor_servico_carrinho * $this->quantidade_servico_carrinho);

        (new VendaDAO())->AddCarrinho($this);
    }

    public function DeleteCarrinho($id)
    {
        (new VendaDAO())->DeleteCarrinho($id);
    }

    public function LimparCarrinho()
    {
        (new VendaDAO())->LimparCarrinho();
    }

    public function VerItensList($id)
    {
        return $this->rows = (new VendaDAO())->SelectItens($id);
    }
}