<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../App/Views/Includes/css_config.php" ?>
    <title>Document</title>

    <?php 
        $models = $model;
        $model_animal = $models[0];
        $model_cliente = $models[1];
    ?>

    <style>
        label 
        {
            display: block;
        }
    </style>
</head>
<body>
<nav class="menu-lateral">
    <div class="btn-expandir">
      <i class="bi bi-list" id="expandir"></i>
    </div>
      <ul class="menu-principal">
        <li class="item-menu" id="inicio">
          <a href="/">
            <span class="icon"><i class="bi bi-house"></i></span>
            <span class="txt-link">Inicio</span>
          </a>
        </li>
        <li class="item-menu" id="cadastros">
          <a href="#">
            <span class="icon"><i class="bi bi-person-plus"></i></span>
            <span class="txt-link">Adicionar</span>
          </a>
          <!-- <span class="dropdown"><i class="bi bi-caret-down-fill"></i></span> -->
        </li>
        <li class="item-menu">
          <a href="#">
            <span class="icon">
              <i class="bi bi-calendar2-plus"></i>
            </span>
            <span class="txt-link">Horários</span>
          </a>
          <!-- <span class="dropdown"><i class="bi bi-caret-down-fill"></i></span> -->
        </li>
        <li class="item-menu">
          <a href="#">
            <span class="icon">
              <i class="bi bi-box2"></i>
            </span>
            <span class="txt-link">Estoque</span>
          </a>
        </li>
      </ul>
    </div>
  </nav><!-- menu lateral -->


    <!-- FIM DA SIDEBAR -->

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
        <label for="peso_animal"  class="form-label">Peso</label>
        <input type="text" class="form-control" name="peso_animal" id="peso_animal" value="<?= $model_animal->peso ?>">
      </div>

      <div class="col-3">
        <div class="form-check">
            <input class="form-check-input" type="radio" id="pequeno_porte_animal" name="porte_animal" value="P" checked>
            <label class="form-check-label"  for="pequeno_porte_animal">Pequeno</label>
        </div>
      </div>

      <div class="col-3">
        <div class="form-check">
            <input class="form-check-input"  type="radio" id="medio_porte_animal" name="porte_animal" value="M">
            <label class="form-check-label" for="medio_porte_animal">Médio</label>
        </div>
      </div>

      <div class="col-3">
        <div class="form-check">
            <input class="form-check-input" type="radio" id="grande_porte_animal" name="porte_animal" value="G">
            <label class="form-check-label"  for="grande_porte_animal">Grande</label>
        </div>
      </div>


      <div class="col-md-10">
        <label for="id_cliente_animal" class="form-label">Cliente</label>
        <select id="id_cliente_animal" name="id_cliente_animal" class="form-select">
                <?php if (count($model_cliente->rows) != 0): ?>
                        <?php foreach($model_cliente->rows as $cliente): ?>
                            <option value="<?= $cliente->id ?>"><?= $cliente->nome ?></option>
                        <?php endforeach ?>
                    <?php else: ?>
                            <option>Cadastre o cliente...</option>
                    <?php endif ?>
                </select>
        
      </div>

     
      <div class="col-10">
        <button class="btn btn-primary" id="btn-enviar" type="submit">Enviar</button>
      </div>
    </form>
    <?php include "../App/Views/Includes/JsConfig.php"?>
</body>
</html>