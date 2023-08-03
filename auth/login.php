<?php

include('connection.php');

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tela de login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/styles.css">
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
            <a class="nav-link active" aria-current="page" href="../public/index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../public/categories.php">Categorias</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../public/details.php">Detalhes</a>
            </li>
            <a href=""><button class="btn btn-primary position-absolute bottom-25 end-0" type="button">Entrar</button></a>
        </div>
      </div>
    </nav>
  </header>
  <main class="menu">
    <h1 class="t-login">Faça seu login</h1>
    <!-- Formulário -->
    <form action="" method="POST">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email:</label>
        <input type="text" class="form-control" id="email" aria-describedby="emailHelp" name='email'>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Senha: </label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="senha">
      </div>
      <div class="d-grid gap-2 col-6 mx-auto">
        <button type="submit" class="btn btn-primary">Entrar</button>
      </div>
      <?php
      if (isset($_POST['email']) || isset($_POST['senha'])) {
        if (strlen($_POST['email']) == 0) {

        } else if (strlen($_POST['senha']) == 0) {

        } else {

          $email = $mysqli->real_escape_string($_POST['email']);
          $senha = $mysqli->real_escape_string($_POST['senha']);

          $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
          $sql_query = $mysqli->query($sql_code) or die("Falha na conexão do código SQL " . $mysqli->errno);

          $quantidade = $sql_query->num_rows;

          if ($quantidade == 1) {
            $usuario = $sql_query->fetch_assoc();

            if (!isset($_SESSION)) {
              session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: ../app/admin/companies.php");

          } else {
            echo "<br><br>" . "Email ou senha incorretos. Tenta novamente.";

          }
        }
      }
      ?>
    </form>
  </main>
</body>

</html>