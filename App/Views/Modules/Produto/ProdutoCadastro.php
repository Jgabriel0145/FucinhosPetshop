<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include "../App/Views/Includes/CssConfig.php" ?>

</head>
<body>
      
  <?php include "../App/Views/Includes/Navbar/navbar.php" ?>
    <form action="/produto/cadastro/save" method="post">
        <input type="hidden" name="id" value="<?= $model->id ?>">
        <input type="text" name="descricao_produto" placeholder="descricao"
            value="<?= $model->descricao ?>">
        <input type="number" name="preco_produto" placeholder="preco"
            value="<?= $model->preco ?>">
        <input type="number" name="estoque_produto" placeholder="estoque"
            value="<?= $model->estoque ?>">

        <button type="submit">Enviar</button>
    </form>
</body>
</html>