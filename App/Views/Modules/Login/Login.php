<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../App/Views/Includes/CssConfig.php" ?>
    <title>Fucinho's Petshop</title>
</head>
<body>
    
<div class="login">
 
    <img id="img_fucinhos_login" src="/Views/Includes/Imagens/LogoPetShop.png">



    <form class="form" id="form_login" action="/funcionario/login/auth" method="post">
        <input type="email" class="form-control" name="email_login" placeholder="email">
        <input type="password" class="form-control" name="senha_login" placeholder="senha">
        <br/>
        <button class="btn btn-primary" id="btn-enviar" type="submit">Login</button>
    </form>
    </div>
</div>

</body>
</html>