<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Vendas</title>
  <?php //include "../App/Views/Includes/CssConfig.php" 
  ?>

  <?php
  $model_venda = $model[0];
  $model_cliente = $model[1];
  $model_funcionario = $model[2];
  $model_produto = $model[3];
  $model_servico = $model[4]
  ?>

  <style>
    .table {
      width: 60%;
    }

    .id_produto_servico {
      visibility: hidden;
    }
  </style>

  <? //php include VIEWS.'Venda/Includes/EsconderSelect.php' 
  ?>
</head>

<body>

  <section class="home">
    <?php include "../App/Views/Includes/Navbar/navbar.php" ?>

    <form action="/venda/cadastro/carrinho" method="post">
      <input type="hidden" name="id">

      <label for="tipo_venda">Tipo</label>
      <select name="tipo_venda" id="tipo_venda" onchange="EsconderElementos()">
        <option value="N" selected>Selecione o tipo de venda</option>
        <option value="P">Produto</option>
        <option value="S">Serviço</option>
      </select>

      <br><br>

      <label for="id_produto" id="lbl_produto" class="id_produto_servico">Produto</label>
      <select name="id_produto" id="id_produto" class="id_produto_servico">
        <option value="nenhum" selected>Nenhum</option>
        <?php if (count($model_produto->rows) != 0) : ?>
          <?php foreach ($model_produto->rows as $produto) : ?>
            <option value="<?= $produto->id ?>"><?= $produto->descricao ?></option>
          <?php endforeach ?>
        <?php else : ?>
          <option value="cadastrar_produto">Cadastre o produto...</option>
        <?php endif ?>
      </select>

      <input type="number" name="quantidade_produto" class="id_produto_servico" id="quantidade_produto" placeholder="Quantidade produto">

      <br><br>

      <label for="id_servico" id="lbl_servico" class="id_produto_servico">Serviço</label>
      <select name="id_servico" id="id_servico" class="id_produto_servico">
        <option value="nenhum" selected>Nenhum</option>
        <?php if (count($model_servico->rows) != 0) : ?>
          <?php foreach ($model_servico->rows as $servico) : ?>
            <option value="<?= $servico->id ?>"><?= $servico->descricao ?></option>
          <?php endforeach ?>
        <?php else : ?>
          <option value="cadastrar_servico">Cadastre o serviço...</option>
        <?php endif ?>
      </select>

      <input type="number" name="quantidade_servico" class="id_produto_servico" id="quantidade_servico" placeholder="Quantidade Serviço">

      <script>
        const produto = document.getElementById('id_produto');
        const servico = document.getElementById('id_servico');

        const qtd_produto = document.getElementById('quantidade_produto');
        const qtd_servico = document.getElementById('quantidade_servico');

        const lbl_produto = document.getElementById('lbl_produto');
        const lbl_servico = document.getElementById('lbl_servico');

        function EsconderElementos() {
          const tipoVenda = document.getElementById('tipo_venda').value;
          if (tipoVenda === "P") {
            produto.style.visibility = 'visible';
            servico.style.visibility = 'hidden';

            qtd_produto.style.visibility = 'visible';
            qtd_servico.style.visibility = 'hidden';

            lbl_produto.style.visibility = 'visible';
            lbl_servico.style.visibility = 'hidden';
          } else if (tipoVenda === "S") {
            produto.style.visibility = 'hidden';
            servico.style.visibility = 'visible';

            qtd_produto.style.visibility = 'hidden';
            qtd_servico.style.visibility = 'visible';

            lbl_produto.style.visibility = 'hidden';
            lbl_servico.style.visibility = 'visible';
          } else {
            produto.style.visibility = 'hidden';
            servico.style.visibility = 'hidden';

            qtd_produto.style.visibility = 'hidden';
            qtd_servico.style.visibility = 'hidden';

            lbl_produto.style.visibility = 'hidden';
            lbl_servico.style.visibility = 'hidden';
          }
        }
      </script>

      <br><br>

      <button type="submit">Salvar no Carrinho</button>

    </form>

    <br><br>

    <button onclick="document.location='/venda/cadastro/carrinho/ver'">Ver Carrinho</button>
    <br><br>
    <button onclick="document.location='/venda/listagem'">Listagem de Vendas</button>
  </section>
</body>

</html>