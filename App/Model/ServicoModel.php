<?php

namespace App\Model;

use App\DAO\ServicoDAO;

class ServicoModel extends Model
{
    public $id, $descricao, $valor_servico, $valor_pequeno_porte, $valor_medio_porte, $valor_grande_porte;

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