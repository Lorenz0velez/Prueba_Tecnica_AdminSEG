<?php 
include('../componentes/Navbars/Navbar.php');
include('../conexion.php');

$stm=$conexion->prepare("SELECT * FROM user");
$stm->execute();
$users=$stm->fetchAll(PDO::FETCH_ASSOC);



if(isset($_GET["username"])){
    $txtUser_username=(isset($_GET["username"]) ? $_GET["username"] : "");
    $stm=$conexion->prepare("DELETE FROM user WHERE username=:txtUser_username");
    $stm->bindParam(":txtUser_username", $txtUser_username);
    $stm->execute();

    header("location:user.php");
}
?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
  CREATE USER
</button>

<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Password</th>
                <th scope="col">Email</th>
                <th scope="col">Options</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) {
             ?>
            <tr class="">
                <td scope="row"> <?php echo $user["username"]; ?> </td>
                <td><?php echo $user['password']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td>
                    <a href="user.php?username=<?php echo $user["username"]; ?>" class="btn btn-danger">Borrar</a>
                    <a href="edit.php?username=<?php echo $user["username"]; ?>" class="btn btn-success">Editar</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include('create.php'); ?>
<?php 
include('../componentes/Footer.php');
?>


