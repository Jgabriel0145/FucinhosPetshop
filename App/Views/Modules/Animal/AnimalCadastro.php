<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include "../App/Views/Includes/CssConfig.php" ?>
  <title>Document</title>

  <?php
  $models = $model;
  $model_animal = $models[0];
  $model_cliente = $models[1];
  ?>

  <style>
    label {
      display: block;
    }
  </style>
</head>

<body>

  <?php include "../App/Views/Includes/Navbar/navbar.php" ?>
  <section class="home">
    <div class="text">Animais</div>
    <button type="button" id="btn-cliente" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Adicionar animal</button>


    <section class="box-table" id="list-cliente">
      <table class="table">
        <thead>
          <th>Excluir</th>
          <th>Id</th>
          <th>Nome</th>
          <th>Raça</th>
          <th>Peso</th>
          <th>Porte</th>
          <th>Cliente</th>
          <th>Cpf</th>
          <th>Telefone</th>
          <th>Endereco</th>
        </thead>

        <tbody>
          <?php foreach ($model->rows as $item) : ?>

            <tr>
              <td>
                <a href="/animal/excluir?id=<?= $item->id_animal ?>">X</a>
              </td>

              <td><a><?= $item->id_animal ?></a></td>

              <td>
                <a href="/animal/cadastro?id=<?= $item->id_animal ?>"><?= $item->nome_animal ?></a>
              </td>

              <td>
                <a href="/animal/cadastro?id=<?= $item->id_animal ?>"><?= $item->raca ?></a>
              </td>

              <td>
                <a href="/animal/cadastro?id=<?= $item->id_animal ?>"><?= $item->peso ?></a>
              </td>

              <td>
                <a href="/animal/cadastro?id=<?= $item->id_animal ?>"><?= $item->porte ?></a>
              </td>

              <td>
                <a href="/animal/cadastro?id=<?= $item->id_animal ?>"><?= $item->nome_cliente ?></a>
              </td>

              <td>
                <a href="/animal/cadastro?id=<?= $item->id_animal ?>"><?= $item->cpf ?></a>
              </td>

              <td>
                <a href="/animal/cadastro?id=<?= $item->id_animal ?>"><?= $item->telefone ?></a>
              </td>

              <td>
                <a href="/animal/cadastro?id=<?= $item->id_animal ?>"><?= $item->endereco ?></a>
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
      </div>
      </div>
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
            <form class="row g-3" method="post" action="/animal/cadastro/save" id="form-animal">
              <input type="hidden" name="id" value="<?= $model_animal->id ?>">

              <div class="col-10">
                <label for="nome_cliente" class="form-label">Nome</label>
                <input class="form-control" type="text" name="nome_animal" id="nome_animal" value="<?= $model_animal->nome ?>">
              </div>

              <div class="col-md-5">
                <label for="raca_animal" class="form-label">Raça</label>
                <input type="text" class="form-control" name="raca_animal" id="raca_animal" value="<?= $model_animal->raca ?>">
              </div>

              <div class="col-md-5">
                <label for="peso_animal" class="form-label">Peso</label>
                <input type="text" class="form-control" name="peso_animal" id="peso_animal" value="<?= $model_animal->peso ?>">
              </div>

              <div class="col-3">
                <div class="form-check">
                  <input class="form-check-input" type="radio" id="pequeno_porte_animal" name="porte_animal" value="P" checked>
                  <label class="form-check-label" for="pequeno_porte_animal">Pequeno</label>
                </div>
              </div>

              <div class="col-3">
                <div class="form-check">
                  <input class="form-check-input" type="radio" id="medio_porte_animal" name="porte_animal" value="M">
                  <label class="form-check-label" for="medio_porte_animal">Médio</label>
                </div>
              </div>

              <div class="col-3">
                <div class="form-check">
                  <input class="form-check-input" type="radio" id="grande_porte_animal" name="porte_animal" value="G">
                  <label class="form-check-label" for="grande_porte_animal">Grande</label>
                </div>
              </div>


              <div class="col-md-10">
                <label for="id_cliente_animal" class="form-label">Cliente</label>
                <select id="id_cliente_animal" name="id_cliente_animal" class="form-select">
                  <?php if (count($model_cliente->rows) != 0) : ?>
                    <?php foreach ($model_cliente->rows as $cliente) : ?>
                      <option value="<?= $cliente->id ?>"><?= $cliente->nome ?></option>
                    <?php endforeach ?>
                  <?php else : ?>
                    <option>Cadastre o cliente...</option>
                  <?php endif ?>
                </select>

              </div>


              <div class="col-10">
                <button class="btn btn-primary" id="btn-enviar" type="submit">Enviar</button>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>


    <?php include "../App/Views/Includes/JsConfig.php" ?>
  </section>
</body>

</html>