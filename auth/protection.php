<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="../../css/styles.css">
  <link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon">
  <!-- <title>dd</title> -->
</head>

<body>
  <?php

  if (!isset($_SESSION)) {
    session_start();
  }

  if (!isset($_SESSION['id'])) {
    die("<h1>Acesso Negado. Por favor faça o login para continuar.<p><a href=\"../../auth/login.php\">Entrar</a></p> </h1>");

  }

  ?>

</body>

</html>