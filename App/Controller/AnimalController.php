<?php

namespace App\Controller;

class AnimalController extends Controller
{
    static public function Form()
    {
        parent::render('Animal/AnimalCadastro');
    }

    static public function Save() 
    {
        
    }

    static public function List()
    {
        parent::render('Animal/AnimalListagem');
    }

    static public function Delete()
    {

    }
}