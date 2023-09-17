
<?php 
include('../conexion.php');
include('../componentes/Navbar.php');
?>


<?php 
if(isset($_GET["name"])){
    $txtNameCategory=(isset($_GET["name"]) ? $_GET["name"] : "");
    $stm=$conexion->prepare("SELECT * FROM category WHERE name=:txtNameCategory");
    $stm->bindParam(":txtNameCategory", $txtNameCategory);
    $stm->execute();

    $registro = $stm->fetch(PDO::FETCH_LAZY);
    $name=$registro['name'];
    $icon=$registro['icon'];

}

if ($_POST) {
    $txtNameCategory = (isset($_POST['txtNameCategory']) ? $_POST['txtNameCategory'] : "");
    $name = (isset($_POST['name']) ? $_POST['name'] : "");
    $icon = (isset($_POST['icon']) ? $_POST['icon'] : "");

    $stm = $conexion->prepare("UPDATE category SET name=:name, icon=:icon WHERE name=:txtNameCategory");
    $stm->bindParam(":name", $name);
    $stm->bindParam(":icon", $icon);
    $stm->bindParam(":txtNameCategory", $txtNameCategory);

    $stm->execute();

    header("location:category.php"); // Mover la redirección aquí, después de la actualización
}





?>
<form action="" method="post">
      <div class="modal-body">
      <input type="hidden" class="form-control" name="txtNameCategory" value="<?php echo $txtNameCategory ?>" placeholder="Enter name...">

        <label for="">Name</label>
        <input type="text" class="form-control" name="name" value="<?php echo $name ?>" placeholder="Enter category name...">

        <label for="">Icon</label>
        <input type="text" class="form-control" name="icon" value="<?php echo $icon ?>" placeholder="Enter icon for category...">
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