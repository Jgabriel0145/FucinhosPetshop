<?php

namespace App\Controller;

class ClienteController extends Controller
{
    static public function Index()
    {
        parent::render('Cliente/ClienteCadastro');
    }

    static public function Save() 
    {
        
    }

    static public function List()
    {
        parent::render('Cliente/ClienteListagem');
    }

    static public function Delete()
    {

    }
}