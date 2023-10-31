<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Serviços</title>
    <?php include "../App/Views/Includes/CssConfig.php" ?>
</head>
<body>

    <?php //var_dump($model); ?>

    <form action="/servico/cadastro/save" method="post">
        <input type="hidden" name="id" value="<?= $model->id ?>">
        <input type="text" name="descricao_servico" placeholder="descrição"
            value="<?= $model->descricao ?>">
        <input type="text" name="valor_servico"
            value="<?= $model->valor_servico ?>" placeholder="valor">

        <button type="submit">Enviar</button>
    </form>

    
  <?php //include "../App/Views/Includes/Navbar/navbar.php" ?>
    
</body>
</html>