<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <th>Número da Venda</th>
            <th>Produto</th>
            <th>Quantidade de Produto</th>
            <th>Total</th>
            <th>Cliente</th>
            <th>Funcionário</th>
            <th>Data</th>
        </thead>

        <tbody>
            <?php foreach($model['produtos'] as $produtos): ?>
                <tr>
                    <td><a><?= $produtos[1] ?></a></td>

                    <td>
                        <a href=""><?= $produtos[2] ?></a>
                    </td>

                    <td>
                        <a href=""><?= $produtos[3] ?></a>
                    </td>

                    <td>
                        <a href="">R$ <?= number_format($produtos[4], 2, ',', '.') ?></a>
                    </td>

                    <td>
                        <a href=""><?= $produtos[5] ?></a>
                    </td>

                    <td>
                        <a href=""><?= $produtos[6] ?></a>
                    </td>

                    <td>
                        <a href=""><?= $produtos[7] ?></a>
                    </td>
                </tr>
            

            <?php endforeach ?>


            <?php if (count($model['produtos']) == 0): ?>
                <tr>
                    <td colspan="6">
                        Nenhum produto.
                    </td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>

    <br><br>

    <table>
        <thead>
            <th>Número da Venda</th>
            <th>Serviço</th>
            <th>Quantidade de Serviço</th>
            <th>Total</th>
            <th>Cliente</th>
            <th>Funcionário</th>
            <th>Data</th>
        </thead>

        <tbody>
            <?php foreach($model['servicos'] as $servicos): ?>
                <tr>
                    <td><a><?= $servicos[1] ?></a></td>

                    <td>
                        <a href=""><?= $servicos[2] ?></a>
                    </td>

                    <td>
                        <a href=""><?= $servicos[3] ?></a>
                    </td>

                    <td>
                        <a href="">R$ <?= number_format($servicos[4], 2, ',', '.') ?></a>
                    </td>

                    <td>
                        <a href=""><?= $servicos[5] ?></a>
                    </td>

                    <td>
                        <a href=""><?= $servicos[6] ?></a>
                    </td>

                    <td>
                        <a href=""><?= $servicos[7] ?></a>
                    </td>
                </tr>
            

            <?php endforeach ?>


            <?php if (count($model['servicos']) == 0): ?>
                <tr>
                    <td colspan="6">
                        Nenhum serviço.
                    </td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>

    <br><br>
    TOTAL: R$ <?= $model['total'] ?>
    <br><br>
    <button onclick="document.location='/venda/listagem'">Voltar</button>
</body>
</html>