<?php

namespace App\Controller;

class VendaController extends Controller
{
    static public function Index()
    {
        parent::render('Venda/VendaCadastro');
    }

    static public function Save() 
    {
        
    }

    static public function List()
    {
        parent::render('Venda/VendaListagem');
    }

    static public function Delete()
    {

    }
}