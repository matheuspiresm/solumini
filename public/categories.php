<?php

include('../auth/connection.php');

session_start();

// Consulta SQL para buscar empresas em todas as categorias, ordenadas pelo nome da categoria e pela data de expiração do contrato
$sql = "SELECT companies.id, companies.name, companies.city, companies.state, company_categories.name AS category_name, contracts.expire_date
FROM companies
INNER JOIN company_categories ON companies.category_id = company_categories.id
LEFT JOIN contracts ON companies.id = contracts.company_id
ORDER BY company_categories.name, contracts.expire_date";

$result = $mysqli->query($sql);


if (isset($_SESSION['id'])) {

  // Se o usuário estiver logado, oculta o botão de login
  echo "<style> .btnoff{ display: none; }</style>";

} else {
  // Se o usuário estiver deslogado, oculta o botão de logout
  echo "<style> .btnon{ display: none; }</style>";
  echo "<style> .nav-block{ display: none; }</style>";
}


?>

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Categorias</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
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
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="categories.php">Empresas da Categoria</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="details.php">Detalhes da Empresa</a>
            </li>
            <li class="nav-block">
              <a class="nav-link" href="../app/admin/companies.php">Empresas</a>
            </li>
            <li class="nav-block">
              <a class="nav-link" href="../app/admin/contracts.php">Contratos</a>
            </li>
            <div class="btnoff">
              <a href="../auth/login.php"><button class="btn btn-primary position-absolute bottom-25 end-0" type="button">Entrar</button></a>
            </div>
            <div class="btnon">
              <a href="../auth/logout.php"><button class="btn btn-danger position-absolute bottom-25 end-0" type="button">Sair</button></a>
            </div>
        </div>
      </div>
    </nav>
  </header>

  <!-- Conteúdo Principal -->
  <main>
    <h1>Categorias</h1>
    <div class="principal">
      <div class="table-responsive">
        <table class="table table-dark table-hover">
          <thead class="table-light">
            <tr>
              <th scope="col">Categoria</th>
              <th scope="col">Nome da empresa</th>
              <th scope="col">Cidade</th>
              <th scope="col">Vencimento contrato</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Loop para exibir as informações de cada empresa encontrada
            while ($user_data = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>" . $user_data['category_name'] . "</td>";
              echo "<td>" . $user_data['name'] . "</td>";
              echo "<td>" . $user_data['city'] . "</td>";

              // Mudando formato da data de xxxx/xx/xx para xx/xx/xxxx
              $expire_date_formatted = date("d/m/Y", strtotime($user_data['expire_date']));
              if (strtotime($expire_date_formatted) > time()) {
                // Se a data de expiração for maior que a data atual, adicione a classe CSS "active-contract" para destacar a empresa
                echo '<td class="active-contract">' . $expire_date_formatted . ' - <span class="badge bg-success">Ativo</span></td>';
              } else {
                // Caso contrário, não é necessário adicionar a classe CSS
                echo '<td class="inactive-contract">' . $expire_date_formatted . ' - <span class="badge bg-danger">Inativo</span></td>';
                echo "</tr>";
              }

            }
            ?>
        </table>
      </div>
    </div>
  </main>
</body>

</html>