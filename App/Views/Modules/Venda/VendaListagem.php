<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include "../App/Views/Includes/CssConfig.php" ?>

</head>
<body>
      
  <?php //include "../App/Views/Includes/Navbar/navbar.php" ?>
    
  <table>
        <thead>
            <th>Excluir</th>
            <th>Número da venda</th>
            <th>Total</th>
            <th>Cliente</th>
            <th>Funcionário</th>
            <th>Data</th>
            <th>Itens</th>
        </thead>

        <tbody>
            <?php foreach($model->rows as $item): ?>
                <tr>
                    <td>
                        <a href="">X</a>
                    </td>

                    <td><a><?= $item->numero_venda ?></a></td>

                    <td>
                        <a href="">R$ <?= number_format($item->total_venda, 2, ',', '.') ?></a>
                    </td>

                    <td>
                        <a href=""><?= $item->cliente ?></a>
                    </td>

                    <td>
                        <a href=""><?= $item->funcionario ?></a>
                    </td>

                    <td>
                        <a href=""><?= $item->data_venda ?></a>
                    </td>

                    <td>
                        <form action="/venda/listagem/veritens" method="post">
                          <input type="hidden" name="id_procurar_itens" value="<?= $item->id ?>">
                          <button type="submit">Ver Itens</button>
                        </form>
                    </td>
                </tr>
            

            <?php endforeach ?>


            <?php if (count($model->rows) == 0): ?>
                <tr>
                    <td colspan="6">
                        Nenhuma venda.
                    </td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>
</body>
</html>