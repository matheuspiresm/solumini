<?php

include('../../auth/protection.php');
include('../../auth/connection.php');


// Consulta SQL para pegar os dados das empresas junto com o nome da categoria, ordenados pelo ID da empresa de forma decrescente
$sql = "SELECT companies.*, company_categories.name AS category_name
        FROM companies
        INNER JOIN company_categories ON companies.category_id = company_categories.id
        ORDER BY companies.id DESC";

$result = $mysqli->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Empresas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="../../css/styles.css">
  <link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon">
</head>

<body>
  <header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary position-relative">
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
    <h1>
      Bem vindo ao Painel,
      <?php echo $_SESSION['nome']; ?>
      <a href="create-companies.php" class="btn btn-sm btn-success">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
        </svg>
      </a>

      <div class="principal">
        <div class="table-responsive">
          <table class="table table-dark table-hover ">
            <thead class="table-light">
              <tr>
                <th scope="col">Nome</th>
                <th scope="col">Categoria</th>
                <th scope="col">Cidade</th>
                <th scope="col">Estado</th>
                <th scope="col">Descrição</th>
                <th scope="col">Endereço</th>
                <th scope="col">Editar/Excluir</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($user_data = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $user_data['name'] . "</td>";
                echo "<td>" . $user_data['category_name'] . "</td>";
                echo "<td>" . $user_data['city'] . "</td>";
                echo "<td>" . $user_data['state'] . "</td>";
                echo "<td>" . $user_data['description'] . "</td>";
                echo "<td>" . $user_data['address'] . "</td>";
                echo "<td>
                    <a class='btn btn-sm btn-primary' href='edit-companies.php?id=$user_data[id]'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-fill' viewBox='0 0 16 16'>
                    <path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z'/>
                   </svg></a>
                    <a class='btn btn-sm btn-danger' href='delete-companies.php?id=$user_data[id]'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                    </svg>
                    </a>
                   </td>";
                echo "</tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </h1>
  </main>
</body>

</html>