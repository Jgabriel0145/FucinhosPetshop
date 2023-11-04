<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Serviços</title>
    <?php //include "../App/Views/Includes/CssConfig.php" ?>

</head>
<body>
      
    <?php include "../App/Views/Includes/Navbar/navbar.php" ?>

    <table>
        <thead>
            <th>Excluir</th>
            <th>Id</th>
            <th>Descrição</th>
            <th>Valor do Serviço</th>
        </thead>

        <tbody>
            <?php foreach($model->rows as $item): ?>

                <tr>
                    <td>
                        <a href="/servico/excluir?id=<?= $item->id ?>">X</a>
                    </td>

                    <td><a><?= $item->id ?></a></td>

                    <td>
                        <a href="/servico/cadastro?id=<?= $item->id ?>"><?= $item->descricao ?></a>
                    </td>

                    <td>
                        <a href="/servico/cadastro?id=<?= $item->id ?>"><?= $item->valor_servico ?></a>
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