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
            <th>Nome</th>
            <th>CPF</th>
            <th>Email</th>
            <th>Administrador</th>
        </thead>

        <tbody>
            <?php foreach($model->rows as $item): ?>

                <tr>
                    <td>
                        <a href="/funcionario/excluir?id=<?= $item->id ?>">X</a>
                    </td>

                    <td><a><?= $item->id ?></a></td>

                    <td>
                        <a href="/funcionario/cadastro?id=<?= $item->id ?>"><?= $item->nome ?></a>
                    </td>

                    <td>
                        <a href="/funcionario/cadastro?id=<?= $item->id ?>"><?= $item->cpf ?></a>
                    </td>

                    <td>
                        <a href="/funcionario/cadastro?id=<?= $item->id ?>"><?= $item->email ?></a>
                    </td>

                    <td>
                        <?php if($item->admin == 1) : ?>
                            <a href="/funcionario/cadastro?id=<?= $item->id ?>">Sim</a>
                        <?php else:?>
                            <a href="/funcionario/cadastro?id=<?= $item->id?>">Não</a>
                        <?php endif; ?>
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