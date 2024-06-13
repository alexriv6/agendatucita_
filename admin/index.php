<?php
include("componentes/conexion.php");
@session_start();
if(isset($_SESSION["Username"])) header("Location: index.html");
$posibles= $pdo->prepare("SELECT * FROM posibles WHERE estatus = 1");
$posibles->execute();
$resultado=$posibles->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Gestor de citas y documentos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https:///cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  </head>
  <body><br>
<div class="container">
<div class="row">
    <div class="col-md-2 offset-8">
      <a class="btn btn-primary" type="button" href="logout.php">Salir</a>
      </div>
      <div class="col-md-2">
      <a  class="btn btn-primary" type="button" href="ver.php">Ver calendario</a> </div>
  </div>
</div>
  <div class="container">
    <div class="col-md-12">
      <h1>Citas pendientes de agendar</h1><br>
      <div class="table-responsive">
        <table class="table" id="table">
          <thead class="table-dark">
            <tr>
              <th style="display: none;" scope="col">Id</th>
              <th scope="col">Nombre</th>
              <th scope="col">Motivo</th>
              <th scope="col">Fecha</th>
              <th scope="col">Hora</th>
              <th scope="col">Teléfono</th>
              <th scope="col">Correo</th>
              <th scope="col">Materia</th>
              <th scope="col">Evento</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody> 
          <?php foreach ($resultado as $row):?>
            <tr class="">
              <td  style="display: none;" scope="row"><? echo $row["id_posible"]; ?></td>
              <td value="<?php echo $row["nombre"]; ?>"><?php echo $row["nombre"]; ?></td>
              <td><?php echo $row["motivo"]; ?></td>
              <td><?php echo $row["date"]; ?></td>
              <td><?php echo $row["time"]; ?></td>
              <td><?php echo $row["tel"]; ?></td>
              <td><?php echo $row["email"]; ?></td>
              <td><?php echo $row["materia"]; ?></td>
              <td>pendiente de agendar</td>
              <td><a class="btn btn-danger" href="calendar.php?id_posible=<?php echo $row["id_posible"];?>">Agendar</a></td>
            </tr>
            <?php endforeach; ?> 
          </tbody>
        </table>
      </div>
    </div>
  </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script>
       $(document).ready( function () {
            $('table').DataTable();
        } );
  </script>
  </body>
</html>