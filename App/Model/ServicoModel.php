<?php

namespace App\Model;

use App\DAO\ServicoDAO;

class ServicoModel extends Model
{
    public $id, $descricao, $data_servico, $id_cliente;

    public function Save()
    {
        if ($this->id == null) (new ServicoDAO())->Insert($this);
        else (new ServicoDAO())->Update($this);
    }

    public function GetAllRows()
    {
        return $this->rows = (new ServicoDAO())->Select();
    }

    public function SearchById($id)
    {
        return (new ServicoDAO())->SearchById($id);
    }

    public function Delete($id)
    {
        (new ServicoDAO())->Delete($id);
    }
}