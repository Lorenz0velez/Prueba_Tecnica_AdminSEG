<?php 
if($_POST){
    $name=( isset($_POST['name']) ? $_POST['name'] : "" );
    $category=( isset($_POST['category']) ? $_POST['category'] : "" );
    $image=( isset($_POST['image']) ? $_POST['image'] : "" );

    $stm=$conexion->prepare("INSERT INTO products(Name,Category,Image) VALUES (:name,:category,:image)");
    $stm->bindParam(":name",$name);
    $stm->bindParam(":category",$category);
    $stm->bindParam(":image",$image);

    $stm->execute();

    header("location:products.php");
}
?>

<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CREATE PRODUCT</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="" method="post">
      <div class="modal-body">

        <label for="">Name</label>
        <input type="text" class="form-control" name="name" value="" placeholder="Enter name...">

        <label for="">Category</label>
        <input type="text" class="form-control" name="category" value="" placeholder="Enter category...">

        <label for="">Image</label>
        <input type="text" class="form-control" name="image" value="" placeholder="Enter image url...">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Create</button>
      </div>
      </form>
    </div>
  </div>
</div>