<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Lorenzo Velez AdminSEG</title>
  </head>
  <?php
  include('conexion.php')
  ?>
  <body>
    <h1>BUSCADOR DE PRODUCTOS</h1>

    <form method="get" class="d-flex">
        <input class="form-control me-2" type="text"   name="busqueda"  placeholder="Search" aria-label="Search">
        <input class="btn btn-warning" type="submit" name="enviar"  value="SEARCH" placeholder="Search" aria-label="Search">
      </form>

      <?php
    if (isset($_GET['enviar'])) {
      $busqueda = $_GET['busqueda'];
      $consulta = $conexion->prepare("SELECT * FROM products WHERE name LIKE :busqueda");
      $busqueda = '%' . $busqueda . '%'; // Agrega los '%' al valor de búsqueda
      $consulta->bindParam(':busqueda', $busqueda, PDO::PARAM_STR);
      $consulta->execute();
  
      while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
          echo '<h5> Product Name: ' . $row['name'] . '</h5>';
          echo '<h5> Category: '. $row['category'] . '</h5>';
          echo '<h5> Image URL: ' . $row['image'] . '</h5>';
      }
  }
    ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>