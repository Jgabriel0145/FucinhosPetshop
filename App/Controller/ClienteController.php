<?php

namespace App\Controller;

class ClienteController extends Controller
{
    static public function Index()
    {
        parent::render('Cliente/ClienteCadastro');
    }
}