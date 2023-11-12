<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>

    <?php
        $model_venda = $model[0];
        $model_cliente = $model[1];
        $model_funcionario = $model[2];
    ?>
</head>
<body>

    <table>
        <thead>
            <th>Excluir</th>
            <th>Id</th>
            <th>Produto</th>
            <th>Quantidade de Produto</th>
            <th>Valor Unitário do Produto</th>
            <th>Valor Total</th>
        </thead>

        <tbody>
            <?php foreach($model_venda['produtos'] as $produtos): ?>
                <tr>
                    <td>
                        <a href="/venda/cadastro/carrinho/ver/excluir?id=<?= $produtos[0] ?>">X</a>
                    </td>

                    <td>
                        <?= $produtos[0] ?>
                    </td>

                    <td>
                        <?= $produtos[1] ?>
                    </td>

                    <td>
                        <?= $produtos[2] ?>
                    </td>

                    <td>
                        R$ <?= number_format($produtos[3], 2, ',', '.') ?>
                    </td>

                    <td>
                        R$ <?= number_format($produtos[4], 2, ',', '.') ?>
                    </td>
                </tr>
            

            <?php endforeach ?>


            <?php if (count($model_venda['produtos']) == 0): ?>
                <tr>
                    <td colspan="6">
                        Nenhum produto.
                    </td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>

    <br>

    <table>
        <thead>
            <th>Excluir</th>
            <th>Id</th>
            <th>Serviço</th>
            <th>Porte do Animal</th>
            <th>Quantidade de Serviço</th>
            <th>Valor do Serviço</th>
            <th>Valor Total</th>
        </thead>

        <tbody>
            <?php foreach($model_venda['servicos'] as $servicos): ?>
                <?php
                    if ($servicos[2] == 'P') $servicos[2] = 'Pequeno';
                    else if ($servicos[2] == 'M') $servicos[2] = 'Médio';
                    else if ($servicos[2] == 'G') $servicos[2] = 'Grande';
                ?>
                
                <tr>
                    <td>
                        <a href="/venda/cadastro/carrinho/ver/excluir?id=<?= $servicos[0] ?>">X</a>
                    </td>

                    <td>
                        <?= $servicos[0] ?>
                    </td>

                    <td>
                        <?= $servicos[1] ?>
                    </td>

                    <td>
                        <?= $servicos[2] ?>
                    </td>

                    <td>
                        <?= $servicos[3] ?>
                    </td>

                    <td>
                        R$ <?= number_format($servicos[4], 2, ',', '.') ?>
                    </td>

                    <td>
                        R$ <?= number_format($servicos[5], 2, ',', '.') ?>
                    </td>
                </tr>
            

            <?php endforeach ?>


            <?php if (count($model_venda['servicos']) == 0): ?>
                <tr>
                    <td colspan="6">
                        Nenhum serviço.
                    </td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>

    <br><br>

    <h2>Valor Total da Compra: R$ <?= number_format($model_venda['total'], 2, ',', '.') ?></h2>

    <br><br>

    <form action="/venda/cadastro/carrinho/ver/save" method="post">
        <label for="id_cliente">Cliente</label>
        <select name="id_cliente">
            <option value="nenhum" selected>Nenhum</option>
            <?php if (count($model_cliente->rows) != 0): ?>
                <?php foreach($model_cliente->rows as $cliente): ?>
                    <option value="<?= $cliente->id ?>"><?= $cliente->nome ?></option>
                <?php endforeach ?>
            <?php else: ?>
                <option disabled>Cadastre o cliente...</option>
            <?php endif ?>
        </select>

        <br><br>

        <label for="id_funcionario">Funcionário</label>
        <select name="id_funcionario">
            <option value="nenhum" selected>Nenhum</option>
            <?php if (count($model_funcionario->rows) != 0): ?>
                <?php foreach($model_funcionario->rows as $funcionario): ?>
                    <option value="<?= $funcionario->id ?>"><?= $funcionario->nome ?></option>
                <?php endforeach ?>
            <?php else: ?>
                <option disabled>Cadastre o funcionário...</option>
            <?php endif ?>
        </select>

        <br><br>

        <button type="submit">Confimar venda</button>
    </form>
    
</body>
</html>