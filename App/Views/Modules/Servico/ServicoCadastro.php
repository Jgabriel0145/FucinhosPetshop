<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../App/Views/Includes/CssConfig.php" ?>
    <?php 
        $model_servico = $model[0];
        $model_cliente = $model[1];
        $model_funcionario = $model[2];
    ?>
</head>
<body>

    <?php //var_dump($model); ?>

    <form action="/servico/cadastro/save" method="post">
        <input type="hidden" name="id" value="<?= $model_servico->id ?>">
        <input type="text" name="descricao_servico" placeholder="descrição"
            value="<?= $model_servico->descricao ?>">
        <input type="date" name="data_servico"
            value="<?= $model_servico->data_servico ?>">
        <select name="id_cliente_servico">
            <?php foreach ($model_cliente->rows as $cliente): ?>
                <option value="<?= $cliente->id ?>"><?= $cliente->nome ?></option>
            <?php endforeach; ?>
        </select>

        <select name="id_funcionario_servico">
            <?php foreach ($model_funcionario->rows as $funcionario): ?>
                <option value="<?= $funcionario->id ?>"><?= $funcionario->nome ?></option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Enviar</button>
    </form>

    
  <?php //include "../App/Views/Includes/Navbar/navbar.php" ?>
    
</body>
</html>