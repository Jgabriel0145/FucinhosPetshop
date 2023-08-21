<?php

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

use App\Controller\{AnimalController, ClienteController, ProdutoController, ServicoController, VendaController};

switch ($url)
{
    //Animal
    case '/animal/cadastro':
        AnimalController::Index();
        break;

    case '/animal/cadastro/save':
        AnimalController::Save();
        break;

    case '/animal/listagem':
        AnimalController::List();
        break;

    case '/animal/excluir':
        AnimalController::Delete();
        break;


    //Cliente
    case '/cliente/cadastro':
        ClienteController::Index();
        break;

    case '/cliente/cadastro/save':
        ClienteController::Save();
        break;

    case '/cliente/listagem':
        ClienteController::List();
        break;

    case '/cliente/excluir':
        ClienteController::Delete();
        break;

    
    //Produto
    case '/produto/cadastro':
        ProdutoController::Index();
        break;

    case '/produto/cadastro/save':
        ProdutoController::Save();
        break;

    case '/produto/listagem':
        ProdutoController::List();
        break;

    case '/produto/excluir':
        ProdutoController::Delete();
        break;


    //Servico
    case '/servico/cadastro':
        ServicoController::Index();
        break;

    case '/servico/cadastro/save':
        ServicoController::Save();
        break;

    case '/servico/listagem':
        ServicoController::List();
        break;

    case '/servico/excluir':
        ServicoController::Delete();
        break;

    
    //Venda
    case '/venda/cadastro':
        VendaController::Index();
        break;

    case '/venda/cadastro/save':
        VendaController::Save();
        break;

    case '/venda/listagem':
        VendaController::List();
        break;

    case '/venda/excluir':
        VendaController::Delete();
        break;


    default:
        include '/App/Views/Inicio.php';
        break;
}