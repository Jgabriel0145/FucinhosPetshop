<?php

namespace App\Model;

use App\DAO\FuncionarioDAO;

class FuncionarioModel extends Model
{
    public $id, $nome, $cpf, $email, $senha, $admin;

    public function Save()
    {
        (new FuncionarioDAO())->Insert($this);
    }
}