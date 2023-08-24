<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <form method="post" action="/animal/cadastro/save">
        <input type="hidden" name="id" value="<?= $model_animal->id ?>">

        <label for="nome_animal">Nome</label>
        <input type="text" name="nome_animal" id="nome_animal" value="<?= $model_animal->nome ?>">

        <label for="raca_animal">Raca</label>
        <input type="text" name="raca_animal" id="raca_animal" value="<?= $model_animal->raca ?>">

        <label for="peso_animal">Peso</label>
        <input type="text" name="peso_animal" id="peso_animal" value="<?= $model_animal->peso ?>">
        
        <label for="pequeno_porte_animal">Pequeno</label>
        <input type="radio" id="pequeno_porte_animal" name="porte_animal" value="P" checked>
        
        <label for="medio_porte_animal">Médio</label>
        <input type="radio" id="medio_porte_animal" name="porte_animal" value="M">
        
        <label for="grande_porte_animal">Grande</label>
        <input type="radio" id="grande_porte_animal" name="porte_animal" value="G">
        
        <label for="id_cliente_animal">Cliente</label>
        <select id="id_cliente_animal" name="id_cliente_animal">
            <?php if (count($model_cliente->rows) != 0): ?>
                <?php foreach($model_cliente->rows as $cliente): ?>
                    <option value="<?= $cliente->id ?>"><?= $cliente->nome ?></option>
                <?php endforeach ?>
            <?php else: ?>
                    <option>Cadastre o cliente...</option>
            <?php endif ?>


        </select>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>