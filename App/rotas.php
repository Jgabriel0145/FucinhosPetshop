<?php

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

use App\Controller\{AnimalController, ClienteController, FuncionarioController, InicioController, ProdutoController, ServicoController, VendaController, LoginController};

switch ($url)
{
    //Início
    case '/inicio':
        InicioController::Index();
        break;

    
    //Login
    case '/funcionario/login':
        FuncionarioController::Login();
        break;

    case '/funcionario/login/auth':
        FuncionarioController::Auth();
        break;

    case '/funcionario/login/logout':
        FuncionarioController::Logout();
        break;


    //Animal
    case '/animal/cadastro':
        AnimalController::Form();
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
        ClienteController::FormAndList();
        break;

    case '/cliente/cadastro/save':
        ClienteController::Save();
        break;

    case '/cliente/excluir':
        ClienteController::Delete();
        break;

    
    //Funcionario
    case '/funcionario/cadastro':
        FuncionarioController::Form();
        break;
    
    case '/funcionario/cadastro/save':
        FuncionarioController::Save();
        break;

    case '/funcionario/listagem':
        FuncionarioController::List();
        break;

    case '/funcionario/excluir':
        FuncionarioController::Delete();
        break;

    
    //Produto
    case '/produto/cadastro':
        ProdutoController::Form();
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
        ServicoController::Form();
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
        VendaController::Form();
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
        header('Location: /inicio');
        break;
}