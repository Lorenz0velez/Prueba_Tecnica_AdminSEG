<?php 
include('../../conexion.php');
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $email = $_POST['email'];

      $stm = $conexion->prepare("INSERT INTO user (username, password, email) VALUES (:username, :password, :email)");
      $stm->bindParam(":username", $username);
      $stm->bindParam(":password", $password);
      $stm->bindParam(":email", $email);

      $stm->execute();

      header("location:../../views/Home.php");
  } else {
      header("location:CreateAccount.php");
      echo "Por favor, complete todos los campos obligatorios.";
  }
}

?>
