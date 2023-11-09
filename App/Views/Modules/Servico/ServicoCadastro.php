<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviços</title>
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
        <div class="text">Serviços</div>
        <button type="button" id="btn-cliente" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Adicionar serviço</button>
        <table class="table" id="list-animal">
            <thead>
                <th scope="col">Excluir</th>
                <th scope="col">Descrição</th>
                <th scope="col">Pequeno porte</th>
                <th scope="col">Médio porte</th>
                <th scope="col">Grande porte</th>
            </thead>

            <tbody>
                <?php foreach ($model->rows as $item) : ?>

                    <tr>
                        <td>
                            <a href="/servico/excluir?id=<?= $item->id ?>">X</a>
                        </td>

                        <td>
                            <a href="/servico/cadastro?id=<?= $item->id ?>"><?= $item->descricao ?></a>
                        </td>

                        <td>
                            <a href="/servico/cadastro?id=<?= $item->id ?>">R$ <?= $item->valor_pequeno_porte ?></a>
                        </td>

                        <td>
                            <a href="/servico/cadastro?id=<?= $item->id ?>">R$ <?= $item->valor_medio_porte ?></a>
                        </td>

                        <td>
                            <a href="/servico/cadastro?id=<?= $item->id ?>">R$ <?= $item->valor_grande_porte ?></a>
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

        <!-- MODAL !-->

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cadastro de Serviços</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/servico/cadastro/save">
                            <input type="hidden" name="id" value="<?= $model->id ?>">
                            <div class="mb-3">
                                <label for="descricao_servico" class="form-label">Descrição</label>
                                <input class="form-control" type="text" name="descricao_servico" value="<?= $model->descricao ?>">
                            </div> <br> <br>
                            <div class="mb-3">
                                <h3>Valores</h3> <br>
                                <div class="row">
                                    <div class="col">
                                        <label for="valor_pequeno_porte" class="form-label">Pequeno porte</label>
                                        <input class="form-control" type="number" name="valor_pequeno_porte" id="valor_pequeno_porte" value="<?= $model->valor_pequeno_porte ?>" >
                                    </div>
                                    <div class="col">
                                        <label for="valor_medio_porte" class="form-label">Médio porte</label>
                                        <input class="form-control" type="number" name="valor_medio_porte" id="valor_medio_porte" value="<?= $model->valor_medio_porte ?>" >
                                    </div>
                                    <div class="col">
                                        <label for="valor_grande_porte" class="form-label">Grande porte</label>
                                        <input class="form-control" type="number" name="valor_grande_porte" id="valor_grande_porte" value="<?= $model->valor_grande_porte ?>">
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