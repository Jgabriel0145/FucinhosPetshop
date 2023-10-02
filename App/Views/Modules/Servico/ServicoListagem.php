<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php //include "../App/Views/Includes/CssConfig.php" ?>

</head>
<body>
      
  <?php //include "../App/Views/Includes/Navbar/navbar.php" ?>

  <?php //var_dump($model->rows); ?>

  <table>
        <thead>
            <th>Excluir</th>
            <th>Id</th>
            <th>Descrição</th>
            <th>Data</th>
            <th>Cliente</th>
            <th>Funcionario</th>
        </thead>

        <tbody>
            <?php foreach($model->rows as $item): ?>

                <tr>
                    <td>
                        <a href="/servico/excluir?id=<?= $item->id_servico ?>">X</a>
                    </td>

                    <td><a><?= $item->id_servico ?></a></td>

                    <td>
                        <a href="/servico/cadastro?id=<?= $item->id_servico ?>"><?= $item->descricao_servico ?></a>
                    </td>

                    <td>
                        <a href="/servico/cadastro?id=<?= $item->id_servico ?>"><?= $item->data_servico ?></a>
                    </td>

                    <td>
                        <a href="/servico/cadastro?id=<?= $item->id_servico ?>"><?= $item->cliente ?></a>
                    </td>

                    <td>
                        <a href="/servico/cadastro?id=<?= $item->id_servico ?>"><?= $item->funcionario ?></a>
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