<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque</title>
    <?php include "../App/Views/Includes/CssConfig.php" ?>
    <style>
        .box-table {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .table {
            width: 60%;
        }

        a {
            color: #1aae9f;

        }
    </style>
</head>

<body>

    <?php include "../App/Views/Includes/Navbar/navbar.php" ?>

    <section class="home">
        <div class="text">Estoque</div>
        <button type="button" id="btn-cliente" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Adicionar produto</button>

        <section class="box-table" id="list-produto">
            <table  class="table">
                <thead>
                    <tr>
                        <th scope="col">Excluir</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Estoque</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($model->rows as $item) : ?>

                        <tr>
                            <td>
                                <a href="/produto/excluir?id=<?= $item->id ?>">X</a>
                            </td>

                            <td>
                                <a href="/produto/cadastro?id=<?= $item->id ?>"><?= $item->descricao ?></a>
                            </td>

                            <td>
                                <a href="/produto/cadastro?id=<?= $item->id ?>"><?= $item->preco ?></a>
                            </td>

                            <td>
                                <a href="/produto/cadastro?id=<?= $item->id ?>"><?= $item->estoque ?></a>
                            </td>
                        </tr>


                    <?php endforeach ?>


                    <?php if (count($model->rows) == 0) : ?>
                        <tr>
                            <td colspan="6">
                                Nenhum registro encontrado
                            </td>
                        </tr>
                    <?php endif ?>
                </tbody>
            </table>
        </section>

        <!-- MODAL !-->

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cadastro de Proutos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/produto/cadastro/save">
                            <input type="hidden" name="id" value="<?= $model->id ?>">
                            <div class="mb-3">
                                <label for="descricao_produto" class="form-label">Descrição</label>
                                <input class="form-control" type="text" name="descricao_produto" value="<?= $model->descricao ?>">
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <label for="preco_produto" class="form-label">Preço</label>
                                        <input class="form-control" type="number" name="preco_produto" value="<?= $model->preco ?>">
                                    </div>
                                    <div class="col">
                                        <label for="estoque_produto" class="form-label">Quantidade em estoque</label>
                                        <input class="form-control" type="number" name="estoque_produto" value="<?= $model->estoque ?>">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary" id="btn-enviar" type="submit">Enviar</button>

                        </form>
                    </div>

                </div>
            </div>
        </div>

    </section>
    <?php include "../App/Views/Includes/JsConfig.php" ?>
</body>

</html>