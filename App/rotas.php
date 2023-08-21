<?php

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

use App\Controller\{AnimalController, ClienteController, ProdutoController, ServicoController, VendaController};

switch ($url)
{
    case '/cliente/cadastro':
        ClienteController::Index();
        break;

    default:
        echo 'teste';
        break;
}