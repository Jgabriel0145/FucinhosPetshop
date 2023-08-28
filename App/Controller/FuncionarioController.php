<?php

namespace App\Controller;

use App\Model\FuncionarioModel;

class FuncionarioController extends Controller
{
    static public function Form()
    {
        $model = new FuncionarioModel();

        parent::render('Funcionario/FuncionarioCadastro', $model);
    }

    static public function Save()
    {

    }

    static public function List()
    {

    }

    static public function Delete()
    {

    }
}