<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>

    <?php
        /*$model_venda = $model[0];
        $model_produto = $model[1];
        $model_servico = $model[2];*/
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
            <?php foreach($model['produtos'] as $produtos): ?>
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
                        <a href=""><?= $produtos[3] ?></a>
                    </td>

                    <td>
                        <a href=""><?= $produtos[4] ?></a>
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
            <?php foreach($model['servicos'] as $servicos): ?>
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
                        <a href=""><?= $servicos[3] ?></a>
                    </td>

                    <td>
                        <a href=""><?= $servicos[4] ?></a>
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

    <form action="/venda/cadastro/carrinho/ver/save" method="post">
        <button type="submit">Confimar venda</button>
    </form>
    
    
</body>
</html>