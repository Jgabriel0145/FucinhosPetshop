<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
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
        <div class="text">Clientes</div>
        <button type="button" id="btn-cliente" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Adicionar cliente</button>




        <section class="box-table" id="list-cliente">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Data de Nascimento</th>
                        <th scope="col">Endereço</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($model->rows as $item) : ?>

                        <tr>

                            <td>
                                <a href="/cliente/cadastro?id=<?= $item->id ?>"><?= $item->nome ?></a>
                            </td>

                            <td>
                                <a href="/cliente/cadastro?id=<?= $item->id ?>"><?= $item->cpf ?></a>
                            </td>

                            <td>
                                <a href="/cliente/cadastro?id=<?= $item->id ?>"><?= $item->telefone ?></a>
                            </td>

                            <td>
                                <a href="/cliente/cadastro?id=<?= $item->id ?>"><?= $item->data_nascimento ?></a>
                            </td>

                            <td>
                                <a href="/cliente/cadastro?id=<?= $item->id ?>"><?= $item->endereco ?></a>
                            </td>
                        </tr>


                    <?php endforeach ?>


                    <?php if (count($model->rows) == 0) : ?>
                        <tr>
                            <td colspan="7">
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
                        <h5 class="modal-title" id="exampleModalLabel">Cadastro de Clientes</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/cliente/cadastro/save">
                            <input type="hidden" name="id" value="<?= $model->id ?>">
                            <div class="mb-3">
                                <label for="nome_cliente" class="form-label">Nome</label>
                                <input class="form-control" type="text" name="nome_cliente" id="nome_cliente" value="<?= $model->nome ?>">
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <label for="cpf_cliente" class="form-label">CPF</label>
                                        <input class="form-control" type="text" name="cpf_cliente" id="cpf_cliente" value="<?= $model->cpf ?>" maxlength="11" minlength="11">
                                    </div>
                                    <div class="col">
                                        <label for="telefone_cliente" class="form-label">Telefone</label>
                                        <input class="form-control" type="text" name="telefone_cliente" id="telefone_cliente" value="<?= $model->telefone ?>" maxlength="11" minlength="11">
                                    </div>
                                    <div class="col">
                                        <label for="data_nascimento_cliente" class="form-label">Data de Nascimento</label>
                                        <input class="form-control" type="date" name="data_nascimento_cliente" id="data_nascimento_cliente" value="<?= $model->data_nascimento ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="endereco_cliente" class="form-label">Endereco</label>
                                <input class="form-control" type="text" name="endereco_cliente" id="endereco_cliente" value="<?= $model->endereco ?>">
                            </div>

                            <button class="btn btn-primary" id="btn-enviar" type="submit">Enviar</button>

                        </form>
                    </div>

                </div>
            </div>
        </div>


        <?php include "../App/Views/Includes/JsConfig.php" ?>
    </section>
</body>

</html>