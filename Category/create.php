<?php 
if($_POST){
    $name=( isset($_POST['name']) ? $_POST['name'] : "" );
    $icon=( isset($_POST['icon']) ? $_POST['icon'] : "" );

    $stm=$conexion->prepare("INSERT INTO category(name, icon) VALUES (:name,:icon)");
    $stm->bindParam(":name",$name);
    $stm->bindParam(":icon",$icon);

    $stm->execute();

    header("location:category.php");
}
?>

<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CREATE Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="" method="post">
      <div class="modal-body">

        <label for="">Name</label>
        <input type="text" class="form-control" name="name" value="" placeholder="Enter name...">

        <label for="">Icon</label>
        <input type="text" class="form-control" name="icon" value="" placeholder="Enter icon from category...">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Create</button>
      </div>
      </form>
    </div>
  </div>
</div>