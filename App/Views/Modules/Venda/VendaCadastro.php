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
      $model_servico = $model[4]
    ?>

</head>
<body>
      
    <?//php include "../App/Views/Includes/Navbar/navbar.php" ?>
  
    <form action="/venda/cadastro/carrinho" method="post">
      <input type="hidden" name="id">

      <label for="id_produto">Produto</label>
      <select name="id_produto">
        <option value="nenhum" selected>Nenhum</option>
        <?php if (count($model_produto->rows) != 0): ?>
          <?php foreach($model_produto->rows as $produto): ?>
            <option value="<?= $produto->id ?>"><?= $produto->descricao ?></option>
          <?php endforeach ?>
        <?php else: ?>
          <option value="cadastrar_produto">Cadastre o produto...</option>
        <?php endif ?>
      </select>
      
      <input type="number" name="quantidade_produto" placeholder="Quantidade produto">
      
      <br><br>

      <label for="id_servico">Serviço</label>
      <select name="id_servico">
        <option value="nenhum" selected>Nenhum</option>
        <?php if (count($model_servico->rows) != 0): ?>
          <?php foreach($model_servico->rows as $servico): ?>
            <option value="<?= $servico->id ?>"><?= $servico->descricao ?></option>
          <?php endforeach ?>
        <?php else: ?>
          <option value="cadastrar_servico">Cadastre o serviço...</option>
        <?php endif ?>
      </select>
      
      <input type="number" name="quantidade_servico" placeholder="Quantidade Serviço">

      <br><br>

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

      <button type="submit">Salvar no Carrinho</button>

    </form>

    <br><br>

    <button onclick="">Ver Carrinho</button>

</body>
</html>