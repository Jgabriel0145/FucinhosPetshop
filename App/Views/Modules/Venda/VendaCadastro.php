<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Vendas</title>
    <?//php include "../App/Views/Includes/CssConfig.php" ?>

    <?php 
      $model_venda = $model[0];
      $model_cliente = $model[1];
      $model_funcionario = $model[2];
      $model_produto = $model[3];
    ?>

</head>
<body>
      
    <?//php include "../App/Views/Includes/Navbar/navbar.php" ?>
  
    <form action="/venda/cadastro/carrinho" method="post">
      <input type="hidden" name="id">

      <select name="id_produto">
        <?php if (count($model_produto->rows) != 0): ?>
          <?php foreach($model_produto->rows as $produto): ?>
            <option value="<?= $produto->id ?>"><?= $produto->nome ?></option>
          <?php endforeach ?>
        <?php else: ?>
          <option>Cadastre o produto...</option>
        <?php endif ?>
      </select>

      <select name="id_cliente">
        <?php if (count($model_cliente->rows) != 0): ?>
          <?php foreach($model_cliente->rows as $cliente): ?>
            <option value="<?= $cliente->id ?>"><?= $cliente->nome ?></option>
          <?php endforeach ?>
        <?php else: ?>
          <option>Cadastre o cliente...</option>
        <?php endif ?>
      </select>

      <select name="id_funcionario">
        <?php if (count($model_funcionario->rows) != 0): ?>
          <?php foreach($model_funcionario->rows as $funcionario): ?>
            <option value="<?= $funcionario->id ?>"><?= $funcionario->nome ?></option>
          <?php endforeach ?>
        <?php else: ?>
          <option>Cadastre o funcionário...</option>
        <?php endif ?>
      </select>

    </form>

    <button onclick="">Ver Carrinho</button>

</body>
</html>