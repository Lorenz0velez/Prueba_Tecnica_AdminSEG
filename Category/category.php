<?php 
include('../componentes/Navbars/Navbar.php');
include('../conexion.php');

$stm=$conexion->prepare("SELECT * FROM category");
$stm->execute();
$categories=$stm->fetchAll(PDO::FETCH_ASSOC);



if(isset($_GET["name"])){
    $txtNameCategory=(isset($_GET["name"]) ? $_GET["name"] : "");
    $stm=$conexion->prepare("DELETE FROM category WHERE name=:txtNameCategory");
    $stm->bindParam(":txtNameCategory", $txtNameCategory);
    $stm->execute();

    header("location:category.php");
}



?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
  CREATE CATEGORY
</button>

<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Icon</th>
                <th scope="col">Options</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category) {
                # code...
             ?>
            <tr class="">
                <td scope="row"> <?php echo $category["name"]; ?> </td>
                <td><?php echo $category['icon']; ?></td>
                <td>
                    <a href="category.php?name=<?php echo $category["name"]; ?>" class="btn btn-danger">Borrar</a>
                    <a href="edit.php?name=<?php echo $category["name"]; ?>" class="btn btn-success">Editar</a>
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


