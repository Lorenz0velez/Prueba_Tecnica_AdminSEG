<?php 
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];

session_start();
$_SESSION['email']=$email;

// include('conexion.php');

$conexion=mysqli_connect("localhost", "root", "", "crud_pruebatecnica_adminseg");
$consulta = "SELECT * FROM user WHERE email='$email' AND password='$password' AND username='$username'";

$resultado=mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
    header("location:views/Home.php");
} else{
    header("location:views/Error.php");
}


mysqli_free_result($resultado);
mysqli_close($conexion);

?>