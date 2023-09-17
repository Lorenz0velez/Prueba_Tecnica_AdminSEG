
<?php 
include('../conexion.php');
include('../componentes/Navbar.php');
?>

<?php 
if(isset($_GET["name"])){
    $txtName=(isset($_GET["name"]) ? $_GET["name"] : "");
    $stm=$conexion->prepare("SELECT * FROM products WHERE Name=:txtName");
    $stm->bindParam(":txtName", $txtName);
    $stm->execute();

    $registro = $stm->fetch(PDO::FETCH_LAZY);
    $name=$registro['name'];
    $category=$registro['category'];
    $image=$registro['image'];


}

if ($_POST) {
    $txtName = (isset($_POST['txtName']) ? $_POST['txtName'] : "");
    $name = (isset($_POST['name']) ? $_POST['name'] : "");
    $category = (isset($_POST['category']) ? $_POST['category'] : "");
    $image = (isset($_POST['image']) ? $_POST['image'] : "");

    $stm = $conexion->prepare("UPDATE products SET name=:name, category=:category, image=:image WHERE name=:txtName");
    $stm->bindParam(":name", $name);
    $stm->bindParam(":category", $category);
    $stm->bindParam(":image", $image);
    $stm->bindParam(":txtName", $txtName);

    $stm->execute();

    header("location:products.php"); // Mover la redirección aquí, después de la actualización
}





?>
<form action="" method="post">
      <div class="modal-body">
      <input type="hidden" class="form-control" name="txtName" value="<?php echo $txtName ?>" placeholder="Enter name...">

        <label for="">Name</label>
        <input type="text" class="form-control" name="name" value="<?php echo $name ?>" placeholder="Enter name...">

        <label for="">Category</label>
        <input type="text" class="form-control" name="category" value="<?php echo $category ?>" placeholder="Enter category...">

        <label for="">Image</label>
        <input type="text" class="form-control" name="image" value="<?php echo $image ?>" placeholder="Enter image url...">
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