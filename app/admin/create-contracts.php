<?php

include('../../auth/protection.php');
include('../../auth/connection.php');

if (isset($_POST['submit'])) {

  $company_owner = $_POST['company_owner'];
  $seller_name = $_POST['seller_name'];
  $expire_date = $_POST['expire_date'];

  $result = mysqli_query($mysqli, "INSERT INTO contracts (company_owner, seller_name, expire_date ) 
VALUES ('$company_owner','$seller_name','$expire_date' )");


  if ($result) {
    // Exibe a mensagem "Cadastro realizado com sucesso" e após o usuário clicar em ok, direciona para a página Contracts.php
    echo '<script>alert("Cadastro realizado com sucesso!");</script>';
    echo '<script>
    setTimeout(function() {
        window.location.href = "contracts.php";
    }, 0); // 5000 milissegundos (5 segundos)
</script>';
  }
}

?>

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="../../css/styles.css">
  <link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon">
</head>

<body>
  <header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li>
              <a class="nav-link active" aria-current="page" href="../../public/index.php">Home</a>
            </li>
            <a class="nav-link" href="../../public/categories.php">Empresas da Categoria</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../public/details.php">Detalhes da Empresa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="companies.php">Empresas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contracts.php">Contratos</a>
            </li>
            <a href="../../auth/logout.php"><button class="btn btn-danger position-absolute bottom-25 end-0" type="button">Sair</button></a>
        </div>
      </div>
    </nav>
  </header>
  <!-- Conteúdo Principal -->
  <main>
    <div class="box">
      <form action="create-contracts.php" method="POST">
        <fieldset>
          <legend>Cadastro de Contrato</legend>
          <div class="input-box">
            <label for="company_owner" class="form-label">Proprietário da empresa: </label>
            <input type="text" name="company_owner" id="company_owner" class="form-control" required>
          </div>
          <div class="input-box">
            <label for="seller_name" class="form-label">Nome do vendedor: </label>
            <input type="text" name="seller_name" id="seller_name" class="form-control" required>
          </div>
          <div class="input-box">
            <label for="expire_date" class="form-label">Vencimento do contrato: </label>
            <input type="date" name="expire_date" id="expire_date" class="form-control" required>
          </div>
          <div class="d-grid gap-2 col-6 mx-auto">
            <button type="submit" name="submit" class="btn btn-primary button">Cadastrar</button>
          </div>
        </fieldset>
      </form>
    </div>
  </main>
</body>

</html>