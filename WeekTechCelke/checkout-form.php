<?php
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
include_once './connection.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <title>Formulário de Checkout</title>
</head>

<body>
  <?php
  include_once './menu.php';
  $query_products = "SELECT id, name, price FROM products WHERE id =:id LIMIT 1";
  $result_products = $conn->prepare($query_products);
  $result_products->bindParam(':id', $id, PDO::PARAM_INT);
  $result_products->execute();
  $row_product = $result_products->fetch(PDO::FETCH_ASSOC);
  extract($row_product);
  ?>
  <div class="container">
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="images/logo/logocheck.jpg" alt="" width="100" height="100">
      <h2>Formulário de Pagamento</h2>
      <p class="lead">Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
    </div>
    <div class="row mb-5">
      <div class="col-md-8">
        <h3><?php echo $name; ?></h3>
      </div>
      <div class="row col-md-4">
        <div class="rpw md-1 text-muted"><?php echo number_format($price, 2, ",", ".") ?>
        </div>
      </div>
    </div>
    <hr>
    <div class="row mb-5">
      <div class="col-md-12">
        <h4 class="mb-3">Informações Pessoais</h4>
        <form>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="first_name">Primeiro Nome</label>
              <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Primeiro nome" required>
            </div>
            <div class="form-group col-md-6">
              <label for="last_name">Último Nome</label>
              <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Último nome" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="cpf">CPF</label>
              <input type="text" name="cpf" id="cpf" class="form-control" placeholder="Somente números" maxlength="14" oninput="maskCPF(this)" required>
            </div>
            <div class="form-group col-md-6">
              <label for="last_name">Telefone</label>
              <input type="text" name="phone" id="phone" class="form-control" placeholder="Telefone com DDD" maxlength="14" oninput="mask(this)" required>
            </div>
            <div class="form-group col-md-6">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Difite o seu e-mail">
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
  <script src="./js/scripts.js"></script>
</body>

</html>