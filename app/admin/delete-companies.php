<?php

include('../../auth/protection.php');
include('../../auth/connection.php');

$id = $_GET['id'];

$sqlSelect = "SELECT * FROM companies WHERE id=$id";

$result = $mysqli->query($sqlSelect);

if ($result->num_rows > 0) {
  $sqlDelete = "DELETE FROM companies WHERE id=$id";
  $resultDelete = $mysqli->query($sqlDelete);
  }

  header('Location: companies.php');

?>


