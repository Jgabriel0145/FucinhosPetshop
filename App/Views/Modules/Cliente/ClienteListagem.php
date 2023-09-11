<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes Cadastrados</title>
    <?php include "../App/Views/Includes/CssConfig.php" ?>

</head>
<body>
      
  <?php include "../App/Views/Includes/Navbar/navbar.php" ?>

  <div class="conteudo">
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
    </div>
</body>
</html>