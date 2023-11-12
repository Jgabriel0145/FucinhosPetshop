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
                        <a href="/venda/excluir?id=<?= $item->id ?>">X</a>
                    </td>

                    <td>
                        <?= $item->numero_venda ?>
                    </td>

                    <td>
                        R$ <?= number_format($item->total_venda, 2, ',', '.') ?>
                    </td>

                    <td>
                        <?= $item->cliente ?>
                    </td>

                    <td>
                        <?= $item->funcionario ?>
                    </td>

                    <td>
                        <?= $item->data_venda ?>
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
    
    <br><br>

    <button onclick="document.location='/venda/cadastro'">Voltar</button>
</body>
</html>