<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        label 
        {
            display: block;
        }
    </style>
</head>
<body>
    <form method="post" action="/cliente/cadastro/save">
        <input type="hidden" name="id" value="<?= $model->id ?>">

        <label for="nome_cliente">Nome</label>
        <input type="text" name="nome_cliente" id="nome_cliente" value="<?= $model->nome ?>">

        <label for="cpf_cliente">CPF</label>
        <input type="text" name="cpf_cliente" id="cpf_cliente" value="<?= $model->cpf ?>" maxlength="11">

        <label for="telefone_cliente">Telefone</label>
        <input type="text" name="telefone_cliente" id="telefone_cliente" value="<?= $model->telefone ?>" maxlength="11">
        
        <label for="data_nascimento_cliente">Data de Nascimento</label>
        <input type="date" name="data_nascimento_cliente" id="data_nascimento_cliente" value="<?= $model->data_nascimento ?>">
        
        <label for="endereco_cliente">Endereco</label>
        <input type="text" name="endereco_cliente" id="endereco_cliente" value="<?= $model->endereco ?>">

        <button type="submit">Enviar</button>
    </form>
</body>
</html>