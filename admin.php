<?php
header("Content-type: text/html; charset=utf8");
include 'funciones.php';

$error = false;
$config = include 'config.php';

try {
    $consultaSQL = "SELECT * FROM members";

    $sentencia = $connection->prepare($consultaSQL);
    $sentencia->execute();

    $alumnos = $sentencia->fetchAll();

} catch(PDOException $error) {
    $error= $error->getMessage();
}
?>

<?php include "templates/header.php"; ?>

<?php
if ($error) {
  ?>
  <div class="container mt-2">
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-danger" role="alert">
          <?= $error ?>
        </div>
      </div>
    </div>
  </div>
  <?php
}
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <a href="crear.php"  class="btn btn-primary mt-4">Crear alumno</a>
      <hr>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="mt-3">Lista de alumnos</h2>
      <table class="table">
        <thead>
          <tr>
            <th>Razón Social</th>
            <th>RFC</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($alumnos && $sentencia->rowCount() > 0) {
            foreach ($alumnos as $fila) {
              ?>
              <tr>
                <td><?php echo escapar(utf8_encode($fila["razsoc"])); ?></td>
                <td><?php echo escapar($fila["rfc"]); ?></td>
                <td><?php echo escapar(utf8_encode($fila["correo"])); ?></td>
              </tr>
              <?php
            }
          }
          ?>
        <tbody>
      </table>
    </div>
  </div>
</div>

<?php include "templates/footer.php"; ?>