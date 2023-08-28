<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fucinhu's Petshop</title>
    <?php include "../App/Views/Includes/css_config.php" ?>

</head>
<body>
      
<nav class="menu-lateral">
    <div class="btn-expandir">
      <i class="bi bi-list" id="expandir"></i>
    </div>
      <ul class="menu-principal">
        <li class="item-menu" id="inicio">
          <a href="/">
            <span class="icon"><i class="bi bi-house"></i></span>
            <span class="txt-link">Inicio</span>
          </a>
        </li>
        <li class="item-menu" id="cadastros">
          <a href="/cliente/cadastro">
            <span class="icon"><i class="bi bi-person-plus"></i></span>
            <span class="txt-link">Adicionar</span>
          </a>
          <!-- <span class="dropdown"><i class="bi bi-caret-down-fill"></i></span> -->
        </li>
        <li class="item-menu">
          <a href="#">
            <span class="icon">
              <i class="bi bi-calendar2-plus"></i>
            </span>
            <span class="txt-link">Horários</span>
          </a>
          <!-- <span class="dropdown"><i class="bi bi-caret-down-fill"></i></span> -->
        </li>
        <li class="item-menu">
          <a href="#">
            <span class="icon">
              <i class="bi bi-box2"></i>
            </span>
            <span class="txt-link">Estoque</span>
          </a>
        </li>
      </ul>
    </div>
  </nav><!-- menu lateral -->


    <!-- FIM DA SIDEBAR -->
    <?php include "../App/Views/Includes/JsConfig.php"?>

</body>
</html>