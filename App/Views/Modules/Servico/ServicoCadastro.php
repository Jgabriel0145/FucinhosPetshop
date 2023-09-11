<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../App/Views/Includes/CssConfig.php" ?>
    <?php 
        $model_cliente = $model[1];
    ?>
</head>
<body>
    <form action="/servico/cadastro/save" method="post">
        <input type="text" name="descricao_servico" placeholder="descrição">
        <input type="date" name="data_servico">
        <select name="id_cliente">
            <?php foreach ($model_cliente->rows as $cliente): ?>
                <option value="<?= $cliente->id?>"><?= $cliente->nome ?></option>
            <?php endforeach;?>
        </select>
    </form>

    
  <?php include "../App/Views/Includes/Navbar/navbar.php" ?>
    
</body>
</html>