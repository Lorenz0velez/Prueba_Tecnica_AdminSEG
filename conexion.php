<?php
$servidor="localhost";
$data_base="crud_pruebatecnica_adminseg";
$username="root";
$password="";

try {
    $conexion= new PDO("mysql:host=$servidor;dbname=$data_base",$username,$password);
} catch (Exception $e) {
    echo($e->getMessage());
}


?>