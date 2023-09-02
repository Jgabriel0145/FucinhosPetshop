<?php

namespace App\Model;

use App\DAO\FuncionarioDAO;

class FuncionarioModel extends Model
{
    public $id, $nome, $cpf, $email, $senha, $admin;

    public function Save()
    {
        if ($this->id == null) (new FuncionarioDAO())->Insert($this);
        
        else (new FuncionarioDAO())->Update($this);
    }

    public function GetAllRows()
    {
        return $this->rows = (new FuncionarioDAO())->Select();
    }

    public function SearchById($id)
    {
        return (new FuncionarioDAO())->SearchById($id);
    }

    public function Delete($id)
    {
        (new FuncionarioDAO())->Delete($id);
    }


    //Login
    public function Autenticar()
    {
        return $dados = (new FuncionarioDAO())->SearchByEmailAndSenha($this->email, $this->senha);
    }
}