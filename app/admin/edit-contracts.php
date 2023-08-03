<?php

include('../../auth/protection.php');
include('../../auth/connection.php');

if (!empty($_GET['id'])) {

  $id = $_GET['id'];

  $sqlSelect = "SELECT * FROM contracts WHERE id=$id";

  $result = $mysqli->query($sqlSelect);


  if ($result->num_rows > 0) {
    while ($user_data = mysqli_fetch_assoc($result)) {

      $company_owner = $user_data['company_owner'];
      $seller_name = $user_data['seller_name'];
      $expire_date = $user_data['expire_date'];
    }

  } else {
    header('Location: contracts.php');
  }
}

?>

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Editar Contrato</title>
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
            <li class="nav-item">
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
      <form action="save-contracts.php" method="POST">
        <fieldset>
          <legend>Cadastro de Contrato</legend>
          <div class="input-box">
            <label for="company_owner" class="form-label">Proprietário da empresa: </label>
            <input type="text" name="company_owner" id="company_owner" class="form-control" value="<?php echo $company_owner ?>" required>
          </div>
          <div class="input-box">
            <label for="seller_name" class="form-label">Nome do vendedor: </label>
            <input type="text" name="seller_name" id="seller_name" class="form-control" value="<?php echo $seller_name ?>" required>
          </div>
          <div class="input-box">
            <label for="expire_date" class="form-label">Vencimento do contrato: </label>
            <input type="date" name="expire_date" id="expire_date" class="form-control" value="<?php echo $expire_date ?>" required>
          </div>
          <div class="d-grid gap-2 col-6 mx-auto">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <button type="submit" name="update1" id="update1" class="btn btn-primary d-grid gap-2 col-6 mx-auto">Atualizar</button>
          </div>
        </fieldset>
      </form>
    </div>
  </main>
</body>

</html>