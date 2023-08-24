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
        return (new ClienteDAO())->SearchById($id);
    }

    public function Delete($id)
    {
        (new ClienteDAO())->Delete($id);
    }
}