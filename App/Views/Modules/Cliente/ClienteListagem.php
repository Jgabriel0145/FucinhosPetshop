<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../App/Views/Includes/css_config.php" ?>
    <title>Clientes Cadastrados</title>
</head>
<body>

<nav class="menu-lateral">
    <div class="btn-expandir">
      <i class="bi bi-list" id="expandir"></i>
    </div>
      <ul class="menu-principal">
        <li class="item-menu" id="inicio">
          <a href="/">
            <span class="icon"><i class="bi bi-house"></i></span>
            <span class="txt-link">Inicio</span>
          </a>
        </li>
        <li class="item-menu" id="cadastros">
          <a href="/cliente/cadastro">
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

    <table>
        <thead>
            <th>Excluir</th>
            <th>Id</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Telefone</th>
            <th>Data de Nascimento</th>
            <th>Endereço</th>
        </thead>

        <tbody>
            <?php foreach($model->rows as $item): ?>

                <tr>
                    <td>
                        <a href="/cliente/excluir?id=<?= $item->id ?>">X</a>
                    </td>

                    <td><a><?= $item->id ?></a></td>

                    <td>
                        <a href="/cliente/cadastro?id=<?= $item->id ?>"><?= $item->nome ?></a>
                    </td>

                    <td>
                        <a href="/cliente/cadastro?id=<?= $item->id ?>"><?= $item->cpf ?></a>
                    </td>

                    <td>
                        <a href="/cliente/cadastro?id=<?= $item->id ?>"><?= $item->telefone ?></a>
                    </td>

                    <td>
                        <a href="/cliente/cadastro?id=<?= $item->id ?>"><?= $item->data_nascimento ?></a>
                    </td>

                    <td>
                        <a href="/cliente/cadastro?id=<?= $item->id ?>"><?= $item->endereco ?></a>
                    </td>
                </tr>
            

            <?php endforeach ?>


            <?php if (count($model->rows) == 0): ?>
                <tr>
                    <td colspan="6">
                        Nenhum registro encontrado
                    </td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>
    <?php include "../App/Views/Includes/JsConfig.php"?>
</body>
</html>