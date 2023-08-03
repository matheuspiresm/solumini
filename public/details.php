<?php

include('../auth/connection.php');

session_start();

// Consulta para obter detalhes de todas as empresas e suas categorias
$sql = "SELECT companies.name, companies.city, companies.state, companies.address, company_phones.number AS telefones, company_categories.name AS categoria, companies.description FROM companies INNER JOIN company_categories ON companies.category_id = company_categories.id LEFT JOIN company_phones ON companies.id = company_phones.company_id;";
$resultado = $mysqli->query($sql);

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
  <title>Detalhes</title>
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
    <h1>Detalhes</h1>
    <div class="principal">
      <div class="table-responsive">
        <table class="table table-dark table-hover">
          <thead class="table-light">
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">Cidade</th>
              <th scope="col">Estado</th>
              <th scope="col">Endereço</th>
              <th scope="col">Telefone</th>
              <th scope="col">Categoria</th>
              <th scope="col">Descrição</th>
            </tr>
          </thead>
          <tbody>
            <?php

            // Loop para exibir os detalhes de cada empresa encontrada no banco de dados
            while ($user_data = mysqli_fetch_assoc($resultado)) {
              echo "<tr>";
              echo "<td>" . $user_data['name'] . "</td>";
              echo "<td>" . $user_data['city'] . "</td>";
              echo "<td>" . $user_data['state'] . "</td>";
              echo "<td>" . $user_data['address'] . "</td>";
              echo "<td>" . $user_data['telefones'] . "</td>";
              echo "<td>" . $user_data['categoria'] . "</td>";
              echo "<td>" . $user_data['description'] . "</td>";
              echo "</tr>";
            }
            ?>
        </table>
      </div>
    </div>
  </main>
</body>

</html>