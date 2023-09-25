<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../App/Views/Includes/CssConfig.php" ?>
    <?php 
        $model_cliente = $model[1];
        $model_servico = $model[0];
    ?>
</head>
<body>
    <form action="/servico/cadastro/save" method="post">
        <input type="hidden" name="id" value="<?= $model_servico->id ?>">
        <input type="text" name="descricao_servico" placeholder="descrição">
        <input type="date" name="data_servico">
        <select name="id_cliente_servico">
            <?php foreach ($model_cliente->rows as $cliente): ?>
                <option value="<?= $cliente->id?>"><?= $cliente->nome ?></option>
            <?php endforeach;?>
        </select>

        <button type="submit">Enviar</button>
    </form>

    
  <?php //include "../App/Views/Includes/Navbar/navbar.php" ?>
    
</body>
</html>