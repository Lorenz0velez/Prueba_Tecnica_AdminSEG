<?php 
if($_POST){
    $username=( isset($_POST['username']) ? $_POST['username'] : "" );
    $password=( isset($_POST['password']) ? $_POST['password'] : "" );
    $email=( isset($_POST['email']) ? $_POST['email'] : "" );

    $stm=$conexion->prepare("INSERT INTO user (username, password, email) VALUES (:username,:password,:email)");
    $stm->bindParam(":username",$username);
    $stm->bindParam(":password",$password);
    $stm->bindParam(":email",$email);

    $stm->execute();

    header("location:user.php");
}
?>

<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CREATE USER</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="" method="post">
      <div class="modal-body">

        <label for="">Userame</label>
        <input type="text" class="form-control" name="username" value="" placeholder="Enter username...">

        <label for="">Password</label>
        <input type="text" class="form-control" name="password" value="" placeholder="Enter password...">

        <label for="">Email</label>
        <input type="text" class="form-control" name="email" value="" placeholder="Enter email...">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Create</button>
      </div>
      </form>
    </div>
  </div>
</div>