<?php

include('../../auth/protection.php');
include('../../auth/connection.php');

if (isset($_POST['update'])) {

  $id = $_POST['id'];
  $name = $_POST['name'];
  $category = $_POST['category_id'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $description = $_POST['description'];
  $address = $_POST['address'];

  $sqlUpdate = "UPDATE companies SET name='$name', category_id='$category', city='$city', state='$state', description='$description', address='$address'
      WHERE id='$id'";

  $result = $mysqli->query($sqlUpdate);

  header('Location: companies.php');
}
?>