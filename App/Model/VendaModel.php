<?php

namespace App\Model;

use App\DAO\VendaDAO;

class VendaModel extends Model
{
    //venda
    public $id, $data_venda, $id_venda_itens, $id_cliente, $id_funcionario;

    //venda_itens
    public $id_produto, $id_servico, $quantidade, $total_venda; 

    public function Save()
    {
        if ($this->id == null) (new VendaDAO())->Insert($this);
        else (new VendaDAO())->Update($this);
    }

    public function GetAllRows()
    {
        return $this->rows = (new VendaDAO())->Select();
    }

    public function SearchById($id)
    {
        
    }

    public function Delete($id)
    {
        (new VendaDAO())->Delete($id);
    }

    public function SaveCarrinho()
    {
        
    }
}