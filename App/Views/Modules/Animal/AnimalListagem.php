<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                <th>Raça</th>
                <th>Peso</th>
                <th>Porte</th>
                <th>Cliente</th>
                <th>Cpf</th>
                <th>Telefone</th>
                <th>Endereco</th>
            </thead>

            <tbody>
                <?php foreach ($model->rows as $item) : ?>

                    <tr>
                        <td>
                            <a href="/animal/excluir?id=<?= $item->id_animal ?>">X</a>
                        </td>

                        <td><a><?= $item->id_animal ?></a></td>

                        <td>
                            <a href="/animal/cadastro?id=<?= $item->id_animal ?>"><?= $item->nome_animal ?></a>
                        </td>

                        <td>
                            <a href="/animal/cadastro?id=<?= $item->id_animal ?>"><?= $item->raca ?></a>
                        </td>

                        <td>
                            <a href="/animal/cadastro?id=<?= $item->id_animal ?>"><?= $item->peso ?></a>
                        </td>

                        <td>
                            <a href="/animal/cadastro?id=<?= $item->id_animal ?>"><?= $item->porte ?></a>
                        </td>

                        <td>
                            <a href="/animal/cadastro?id=<?= $item->id_animal ?>"><?= $item->nome_cliente ?></a>
                        </td>

                        <td>
                            <a href="/animal/cadastro?id=<?= $item->id_animal ?>"><?= $item->cpf ?></a>
                        </td>

                        <td>
                            <a href="/animal/cadastro?id=<?= $item->id_animal ?>"><?= $item->telefone ?></a>
                        </td>

                        <td>
                            <a href="/animal/cadastro?id=<?= $item->id_animal ?>"><?= $item->endereco ?></a>
                        </td>
                    </tr>


                <?php endforeach ?>


                <?php if (count($model->rows) == 0) : ?>
                    <tr>
                        <td colspan="6">
                            Nenhum registro encontrado
                        </td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</body>

</html>