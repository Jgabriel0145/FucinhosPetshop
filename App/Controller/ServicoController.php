<?php

namespace App\Controller;

class ServicoController extends Controller
{
    static public function Index()
    {
        parent::render('Servico/ServicoCadastro');
    }

    static public function Save() 
    {
        
    }

    static public function List()
    {
        parent::render('Servico/ServicoListagem');
    }

    static public function Delete()
    {

    }
}