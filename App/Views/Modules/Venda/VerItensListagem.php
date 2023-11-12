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
                    <td><?= $produtos[1] ?></td>

                    <td>
                        <?= $produtos[2] ?>
                    </td>

                    <td>
                        <?= $produtos[3] ?>
                    </td>

                    <td>
                        R$ <?= number_format($produtos[4], 2, ',', '.') ?>
                    </td>

                    <td>
                        <?= $produtos[5] ?>
                    </td>

                    <td>
                        <?= $produtos[6] ?>
                    </td>

                    <td>
                        <?= $produtos[7] ?>
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
            <th>Porte do Animal</th>
            <th>Quantidade de Serviço</th>
            <th>Total</th>
            <th>Cliente</th>
            <th>Funcionário</th>
            <th>Data</th>
        </thead>

        <tbody>
            <?php foreach($model['servicos'] as $servicos): ?>
                <?php
                    if ($servicos[3] == 'P') $servicos[3] = 'Pequeno';
                    else if ($servicos[3] == 'M') $servicos[3] = 'Médio';
                    else if ($servicos[3] == 'G') $servicos[3] = 'Grande';
                ?>

                <tr>
                    <td><?= $servicos[1] ?></td>

                    <td>
                        <?= $servicos[2] ?>
                    </td>

                    <td>
                        <?= $servicos[3] ?>
                    </td>

                    <td>
                        <?= $servicos[4] ?>
                    </td>

                    <td>
                        R$ <?= number_format($servicos[5], 2, ',', '.') ?>
                    </td>

                    <td>
                        <?= $servicos[6] ?>
                    </td>

                    <td>
                        <?= $servicos[7] ?>
                    </td>

                    <td>
                        <?= $servicos[8] ?>
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
    TOTAL: R$ <?= number_format($model['total'], 2, ',', '.') ?>
    <br><br>
    <button onclick="document.location='/venda/listagem'">Voltar</button>
</body>
</html>