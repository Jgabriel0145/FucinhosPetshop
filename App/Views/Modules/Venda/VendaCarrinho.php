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
                        <a href="">X</a>
                    </td>

                    <td><a><?= $produtos[0] ?></a></td>

                    <td>
                        <a href=""><?= $produtos[1] ?></a>
                    </td>

                    <td>
                        <a href=""><?= $produtos[2] ?></a>
                    </td>

                    <td>
                        <a href="">R$ <?= number_format($produtos[3], 2, ',', '.') ?></a>
                    </td>

                    <td>
                        <a href="">R$ <?= number_format($produtos[4], 2, ',', '.') ?></a>
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
            <th>Quantidade de Serviço</th>
            <th>Valor do Serviço</th>
            <th>Valor Total</th>
        </thead>

        <tbody>
            <?php foreach($model_venda['servicos'] as $servicos): ?>
                <tr>
                    <td>
                        <a href="">X</a>
                    </td>

                    <td><a><?= $servicos[0] ?></a></td>

                    <td>
                        <a href=""><?= $servicos[1] ?></a>
                    </td>

                    <td>
                        <a href=""><?= $servicos[2] ?></a>
                    </td>

                    <td>
                        <a href="">R$ <?= number_format($servicos[3], 2, ',', '.') ?></a>
                    </td>

                    <td>
                        <a href="">R$ <?= number_format($servicos[4], 2, ',', '.') ?></a>
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

    <h2>Valor Total da Compra: R$ <?= number_format($model_venda['total'], 2, ',', '.') ?>;</h2>

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
                <option>Cadastre o cliente...</option>
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
                <option>Cadastre o funcionário...</option>
            <?php endif ?>
        </select>

        <br><br>

        <button type="submit">Confimar venda</button>
    </form>
    
</body>
</html>