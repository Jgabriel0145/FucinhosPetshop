<?php

namespace App\Model;

use App\DAO\ClienteDAO;

class ClienteModel extends Model
{
    public $id, $nome, $cpf, $telefone, $data_nascimento, $endereco;

    public function Save()
    {
        if ($this->id == null) (new ClienteDAO())->Insert($this);
        
        else (new ClienteDAO())->Update($this);
    }

    public function GetAllRows()
    {
        return $this->rows = (new ClienteDAO())->Select();
    }

    public function SearchById($id)
    {
        $objeto = (new ClienteDAO())->SearchById($id);

        return ($objeto) ? $objeto : new ClienteModel();
    }

    public function Delete($id)
    {
        (new ClienteDAO())->Delete($id);
    }
}