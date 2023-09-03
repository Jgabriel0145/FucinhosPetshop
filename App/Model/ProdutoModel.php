<?php

namespace App\Model;

use App\DAO\ProdutoDAO;

class ProdutoModel extends Model
{
    public $id, $descricao, $preco, $data_validade, $estoque;

    public function Save()
    {
        if ($this->id == null) (new ProdutoDAO())->Insert($this);
        else (new ProdutoDAO())->Update($this);
    }

    public function GetAllRows()
    {
        return $this->rows = (new ProdutoDAO())->Select();
    }

    public function SearchById($id)
    {
        return (new ProdutoDAO())->SearchById($id);
    }

    public function Delete($id)
    {
        (new ProdutoDAO())->Delete($id);
    }
}