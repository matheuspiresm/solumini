<?php

include('../../auth/protection.php');
include('../../auth/connection.php');

if (isset($_POST['update1'])) {
  $id = $_POST['id'];
  $company_owner = $_POST['company_owner'];
  $seller_name = $_POST['seller_name'];
  $expire_date = $_POST['expire_date'];

  $sqlUpdate = "UPDATE contracts SET id='$id', company_owner='$company_owner', seller_name='$seller_name', expire_date='$expire_date' 
  WHERE id='$id'";

  $result = $mysqli->query($sqlUpdate);

}

header('Location: contracts.php');

?>