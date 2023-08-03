<?php

include('../../auth/protection.php');
include('../../auth/connection.php');

if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $category = $_POST['category_id'];
  $number = $_POST['number'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $description = $_POST['description'];
  $address = $_POST['address'];
  $expire_date = $_POST["expire_date"];

  // Verifica se a empresa já existe na tabela companies pelo nome
  $check_company = "SELECT id FROM companies WHERE name = '$name'";
  $check_company_result = $mysqli->query($check_company);


  if ($check_company_result->num_rows > 0) {

    // Se a empresa já existe, obtém o ID
    $company_data = $check_company_result->fetch_assoc();
    $id = $company_data['id'];

  } else {
    // Se a empresa não existe, insere na tabela companies e obtém o ID
    $insert_company = "INSERT INTO companies (name, category_id, city, state, description, address) 
                              VALUES ('$name', '$category', '$city', '$state', '$description', '$address')";
    $mysqli->query($insert_company);
    $id = $mysqli->insert_id;
  }

  // Insere o telefone na tabela company_phones
  $insert_num = "INSERT INTO company_phones (number, company_id) VALUES ('$number', '$id')";
  $mysqli->query($insert_num);

  // Insere o contrato na tabela contracts
  $insert_contract = "INSERT INTO contracts (company_owner, company_id, seller_name, expire_date) 
                            VALUES ('$name', '$id', '', '$expire_date')";
  $mysqli->query($insert_contract);


  if ($check_company) {
    // Exibe a mensagem "Cadastro realizado com sucesso" e após o usuário clicar em ok, direciona para a página Companies.php
    echo '<script>alert("Cadastro realizado com sucesso!");</script>';
    echo '<script>
    setTimeout(function() {
        window.location.href = "companies.php";
    }, 0);
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

  <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
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
      <form action="create-companies.php" method="POST">
        <fieldset>
          <legend>Cadastro de empresas</legend>
          <div class="input-box">
            <label for="name">Nome: </label>
            <input type="text" name="name" id="name" class="form-control">
          </div>
          <div class="input-box">
            <label for="category_id">Categoria: </label>
            <select name="category_id" id="category_id" class="form-select">
              <option value="1">Alimentação</option>
              <option value="2">Serviços</option>
              <option value="3">Comércio</option>
              <option value="4">Saúde</option>
            </select>
          </div>
          <div class="input-box">
            <label for="number">Telefone: </label>
            <input type="text" name="number" id="number" class="form-control">
          </div>
          <div class="input-box">
            <label for="city">Cidade: </label>
            <input type="text" name="city" id="city" class="form-control">
          </div>
          <div class="input-box">
            <label for="state">Estado: </label>
            <select id="state" name="state" class="form-select">
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
            <input type="text" name="description" id="description" class="form-control" required>
          </div>
          <div class="input-box">
            <label for="address">Endereço: </label>
            <input type="text" name="address" id="address" class="form-control" required>
          </div>
          <div class="input-box">
            <label for="expire_date">Data de Vencimento</label>
            <input type="date" name="expire_date" id="expire_date" class="form-control">
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