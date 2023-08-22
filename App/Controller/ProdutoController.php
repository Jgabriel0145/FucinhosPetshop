<?php

namespace App\Controller;

class ProdutoController extends Controller
{
    static public function Form()
    {
        parent::render('Produto/ProdutoCadastro');
    }

    static public function Save() 
    {
        
    }

    static public function List()
    {
        parent::render('Produto/ProdutoListagem');
    }

    static public function Delete()
    {

    }
}