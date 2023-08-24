<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de clientes</title>
    <?php include "../App/Views/Includes/CssConfig.php" ?>
</head>
<body>

  
<nav class="menu-lateral">
    <div class="btn-expandir">
      <i class="bi bi-list" id="expandir"></i>
    </div>
      <ul class="menu-principal">
        <li class="item-menu" id="inicio">
          <a href="#">
            <span class="icon"><i class="bi bi-house"></i></span>
            <span class="txt-link">Inicio</span>
          </a>
        </li>
        <li class="item-menu" id="cadastros">
          <a href="#">
            <span class="icon"><i class="bi bi-person-plus"></i></span>
            <span class="txt-link">Adicionar</span>
          </a>
          <!-- <span class="dropdown"><i class="bi bi-caret-down-fill"></i></span> -->
        </li>
        <li class="item-menu">
          <a href="#">
            <span class="icon">
              <i class="bi bi-calendar2-plus"></i>
            </span>
            <span class="txt-link">Horários</span>
          </a>
          <!-- <span class="dropdown"><i class="bi bi-caret-down-fill"></i></span> -->
        </li>
        <li class="item-menu">
          <a href="#">
            <span class="icon">
              <i class="bi bi-box2"></i>
            </span>
            <span class="txt-link">Estoque</span>
          </a>
        </li>
      </ul>
    </div>
  </nav><!-- menu lateral -->



    <!-- FIM DA SIDEBAR -->


    <form class="form" method="post" action="/cliente/cadastro/save">
        <input type="hidden" name="id" value="<?= $model->id ?>">

        <label for="nome_cliente" class="form-label">Nome</label>
        <input class="form-control"type="text" name="nome_cliente" id="nome_cliente" value="<?= $model->nome ?>">
        <br/>
        <div class="row">
            <div class="col">
                <label for="cpf_cliente" class="form-label">CPF</label>
                <input class="form-control" type="text" name="cpf_cliente" id="cpf_cliente" value="<?= $model->cpf ?>">
            </div>
            <div class="col">
                <label for="telefone_cliente" class="form-label">Telefone</label>
                <input class="form-control" type="text" name="telefone_cliente" id="telefone_cliente" value="<?= $model->telefone ?>">
            </div>
            <div class="col">
                <label for="data_nascimento_cliente" class="form-label">Data de Nascimento</label>
                <input class="form-control"  type="date" name="data_nascimento_cliente" id="data_nascimento_cliente" value="<?= $model->data_nascimento ?>">
            </div>
        </div>
        <br/>
        <label for="endereco_cliente" class="form-label">Endereco</label>
        <input class="form-control"  type="text" name="endereco_cliente" id="endereco_cliente" value="<?= $model->endereco ?>">
        <br/>
        <button class="btn btn-primary" id="btn-enviar" type="submit">Enviar</button>
    </form>

    <?php include "../App/Views/Includes/JsConfig.php"?>
    </body>
</html>