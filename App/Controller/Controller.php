<?php

namespace App\Controller;

abstract class Controller
{
    protected static function render($view, $model = null)
    {
        
        $arquivo_view = VIEWS . $view . '.php';

        if(file_exists($arquivo_view))
            include $arquivo_view;
        else
            exit('Arquivo da View não encontrado. Arquivo: ' . $view);
    }

    protected static function IsAuthenticated()
    {
        if (!isset($_SESSION['dados_usuario']))
            header('Location: /funcionario/login');
    }

    protected static function IsAdmin()
    {
        if ($_SESSION['dados_usuario']['admin'] == 0)
            header('Location: /inicio');
    }
}