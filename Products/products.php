<?php 
include('../componentes/Navbars/Navbar.php');
include('../conexion.php');

$stm=$conexion->prepare("SELECT * FROM products");
$stm->execute();
$products=$stm->fetchAll(PDO::FETCH_ASSOC);



if(isset($_GET["name"])){
    $txtName=(isset($_GET["name"]) ? $_GET["name"] : "");
    $stm=$conexion->prepare("DELETE FROM products WHERE Name=:txtName");
    $stm->bindParam(":txtName", $txtName);
    $stm->execute();

    header("location:products.php");
}



?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
  CREATE PRODUCT
</button>

<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Image</th>
                <th scope="col">Options</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) {
                # code...
             ?>
            <tr class="">
                <td scope="row"> <?php echo $product["name"]; ?> </td>
                <td><?php echo $product['category']; ?></td>
                <td><?php echo $product['image']; ?></td>
                <td>
                    <a href="products.php?name=<?php echo $product["name"]; ?>" class="btn btn-danger">Borrar</a>
                    <a href="edit.php?name=<?php echo $product["name"]; ?>" class="btn btn-success">Editar</a>
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


