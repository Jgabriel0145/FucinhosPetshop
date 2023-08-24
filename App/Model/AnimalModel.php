<?php

namespace App\Model;

use App\DAO\AnimalDAO;

class AnimalModel extends Model
{
    public $id, $nome, $raca, $peso, $porte, $id_cliente;

    public function Save()
    {
        if ($this->id == null) (new AnimalDAO())->Insert($this);
        
        else (new AnimalDAO())->Update($this);
    }

    public function GetAllRows()
    {
        return $this->rows = (new AnimalDAO())->Select();
    }

    public function SearchById($id)
    {
        return (new AnimalDAO())->SearchById($id);
    }

    public function Delete($id)
    {
        (new AnimalDAO())->Delete($id);
    }
}