<?php

namespace App\Controller;

class InicioController extends Controller
{
    static public function Index()
    {
        parent::IsAuthenticated();

        parent::render('Inicio/Inicio');
    }
}