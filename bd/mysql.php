<?php
  include './mysqlconnect.php';

  $data = json_decode(file_get_contents('php://input'), true);
  $nom = $_POST["nom"];
  $tip = $_POST["tip"];
  $num = $_POST["num"];
  $fech = $_POST["fech"];



  $insertar = "INSERT INTO vue values ('$nom', '$tip', '$num', '$fech')";

  $query = mysqli_query($conn, $insertar);

  if($query) {
    echo "0102a";
  }
  else {
    echo "0102b";
  }

  die;

?>