<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/funcionario/cadastro/save" method="post">
        <input type="text" name="nome_cadastro" placeholder="nome" required>
        <input type="text" name="cpf_cadastro" placeholder="cpf" required maxlength="11">
        <input type="email" name="email_cadastro" placeholder="email" required>
        <input type="password" name="senha_cadastro" placeholder="senha" required>
        <input type="checkbox" name="admin_cadastro">
        <label for="admin_cadastro">Admin</label>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>