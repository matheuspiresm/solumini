<?php

include('../../auth/protection.php');
include('../../auth/connection.php');


if (!empty($_GET['id'])) {

  $id = $_GET['id'];

  $sqlSelect = "SELECT * FROM companies WHERE id=$id";
  // $sqlSelect = "SELECT * FROM company_phones WHERE number='$number'";



  $result = $mysqli->query($sqlSelect);

  if ($result->num_rows > 0) {
    while ($user_data = mysqli_fetch_assoc($result)) {
      $name = $user_data['name'];
      $category = $user_data['category_id'];
      $city = $user_data['city'];
      $state = $user_data['state'];
      $description = $user_data['description'];
      $address = $user_data['address'];
    }

  } else {
    header('Location: companies.php');
  }
}
?>

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Editar Empresa</title>
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
    <div class="box">
      <form action="save-companies.php" method="POST">
        <fieldset>
          <legend>Cadastro de empresas</legend>
          <div class="input-box">
            <label for="name">Nome: </label>
            <input type="text" name="name" id="name" class="input-user form-control" value="<?php echo $name ?>" required>
          </div>
          <div class="input-box">
            <label for="category_id">Categoria: </label>
            <select name="category_id" id="category_id" class="form-select" required>
              <option value="1">Alimentação</option>
              <option value="2">Serviços</option>
              <option value="3">Comércio</option>
              <option value="4">Saúde</option>
            </select>
          </div>
          <div class="input-box">
            <label for="city">Cidade: </label>
            <input type="text" name="city" id="city" class="input-user form-control" value="<?php echo $city ?>" required>
          </div>
          <div class="input-box">
            <label for="state">Estado: </label>
            <select id="state" name="state" class="form-select" required>
              <option value="">Selecione</option>
              <option value="AC">Acre</option>
              <option value="AL">Alagoas</option>
              <option value="AP">Amapá</option>
              <option value="AM">Amazonas</option>
              <option value="BA">Bahia</option>
              <option value="CE">Ceará</option>
              <option value="DF">Distrito Federal</option>
              <option value="ES">Espirito Santo</option>
              <option value="GO">Goiás</option>
              <option value="MA">Maranhão</option>
              <option value="MS">Mato Grosso do Sul</option>
              <option value="MT">Mato Grosso</option>
              <option value="MG">Minas Gerais</option>
              <option value="PA">Pará</option>
              <option value="PB">Paraíba</option>
              <option value="PR">Paraná</option>
              <option value="PE">Pernambuco</option>
              <option value="PI">Piauí</option>
              <option value="RJ">Rio de Janeiro</option>
              <option value="RN">Rio Grande do Norte</option>
              <option value="RS">Rio Grande do Sul</option>
              <option value="RO">Rondônia</option>
              <option value="RR">Roraima</option>
              <option value="SC">Santa Catarina</option>
              <option value="SP">São Paulo</option>
              <option value="SE">Sergipe</option>
              <option value="TO">Tocantins</option>
            </select>
          </div>
          <div class="input-box">
            <label for="description">Descrição: </label>
            <input type="text" name="description" id="description" class="input-user form-control" value="<?php echo $description ?>" required>
          </div>
          <div class="input-box">
            <label for="address">Endereço: </label>
            <input type="text" name="address" id="address" class="input-user form-control" value="<?php echo $address ?>" required>
          </div>
          <div class="input-box">
            <label for="expire_date">Data de Vencimento</label>
            <input type="date" name="expire_date" id="expire_date" class="form-control">
          </div>
          <div class="d-grid gap-2 col-6 mx-auto">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <button type="submit" name="update" id="update" class="btn btn-primary md-m">Atualizar</button>
          </div>
        </fieldset>
      </form>
    </div>
  </main>
</body>

</html>