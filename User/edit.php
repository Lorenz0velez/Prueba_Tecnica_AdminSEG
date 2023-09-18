
<?php 
include('../conexion.php');
include('../componentes/Navbar.php');
?>


<?php 
if(isset($_GET["username"])){
    $txtUser_username=(isset($_GET["username"]) ? $_GET["username"] : "");
    $stm=$conexion->prepare("SELECT * FROM user WHERE username=:txtUser_username");
    $stm->bindParam(":txtUser_username", $txtUser_username);
    $stm->execute();

    $registro = $stm->fetch(PDO::FETCH_LAZY);
    $username=$registro['username'];
    $password=$registro['password'];
    $email=$registro['email'];

}

if ($_POST) {
    $txtUser_username = (isset($_POST['txtUser_username']) ? $_POST['txtUser_username'] : "");
    $username = (isset($_POST['username']) ? $_POST['username'] : "");
    $icon = (isset($_POST['password']) ? $_POST['password'] : "");
    $icon = (isset($_POST['email']) ? $_POST['email'] : "");

    $stm = $conexion->prepare("UPDATE user SET username=:username, password=:password, email=:email WHERE username=:txtUser_username");
    $stm->bindParam(":username", $username);
    $stm->bindParam(":password", $password);
    $stm->bindParam(":email", $email);
    $stm->bindParam(":txtUser_username", $txtUser_username);

    $stm->execute();

    header("location:user.php"); 
}





?>
<form action="" method="post">
      <div class="modal-body">
      <input type="hidden" class="form-control" name="txtNameCategory" value="<?php echo $txtNameCategory ?>" placeholder="Enter name...">

        <label for="">Userame</label>
        <input type="text" class="form-control" name="username" value="<?php echo $username ?>" placeholder="Enter category name...">

        <label for="">Password</label>
        <input type="text" class="form-control" name="password" value="<?php echo $password ?>" placeholder="Enter icon for category...">

        <label for="">Email</label>
        <input type="text" class="form-control" name="email" value="<?php echo $email ?>" placeholder="Enter icon for category...">
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
        <a href="products.php" class="btn btn-danger">Cancel</a>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form>


<?php 
include('../componentes/Footer.php');
?>