<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
        <thead>
            <th>Excluir</th>
            <th>Id</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Estoque</th>
        </thead>

        <tbody>
            <?php foreach($model->rows as $item): ?>

                <tr>
                    <td>
                        <a href="/produto/excluir?id=<?= $item->id ?>">X</a>
                    </td>

                    <td><a><?= $item->id ?></a></td>

                    <td>
                        <a href="/produto/cadastro?id=<?= $item->id ?>"><?= $item->descricao ?></a>
                    </td>

                    <td>
                        <a href="/produto/cadastro?id=<?= $item->id ?>"><?= $item->preco ?></a>
                    </td>

                    <td>
                        <a href="/produto/cadastro?id=<?= $item->id ?>"><?= $item->estoque ?></a>
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
</body>
</html>