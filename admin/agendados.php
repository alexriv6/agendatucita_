<?php
include("componentes/conexion.php");
@session_start();
 if(isset($_SESSION["Username"])) header("Location: index.html");
$eventos= $pdo->prepare("SELECT e.id, e.title, e.name, e.estatus, e.motivo, e.start, e.id_posible, p.id_posible, p.email, p.tel, p.nombre FROM eventos AS e, posibles AS p WHERE e.id_posible = p.id_posible AND e.estatus = 0 ");
$eventos->execute();
$resultado=$eventos->fetchAll(PDO::FETCH_ASSOC);

$eventos2= $pdo->prepare("SELECT e.id, e.title, e.name, e.estatus, e.motivo, e.start, e.id_posible, p.id_posible, p.email, p.tel, p.nombre FROM eventos AS e, posibles AS p WHERE e.id_posible = p.id_posible AND e.estatus = 2");
$eventos2->execute();
$resultado2=$eventos2->fetchAll(PDO::FETCH_ASSOC);

$eventos3= $pdo->prepare("SELECT * FROM eventos WHERE id_posible is NULL");
$eventos3->execute();
$resultado3=$eventos3->fetchAll(PDO::FETCH_ASSOC);
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
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.css"/>
</head>
  <body><br>
<div class="container">
<div class="row">
    <div class="col-md-2 offset-8">
      <a class="btn btn-primary" type="button" href="logout.php">Salir</a>
      </div>
      <div class="col-md-2">
      <a  class="btn btn-primary" type="button" href="ver.php">Volver a calendario</a> </div>
  </div>
</div>
  <div class="container">
    <div class="col-md-12">
      <h1>Citas agendadas</h1><br>
      <h4>Pendientes por notificar</h4>
      <div class="table-responsive">
        <table class="table" id="pendientes">
          <thead class="table-dark">
            <tr>
              <th style="display: none;" scope="col">Id</th>
              <th scope="col">Actor</th>
              <th scope="col">Nombre de la reunion</th>
              <th scope="col">Personaje</th>
              <th scope="col">Correo</th>
              <th scope="col">Fecha y hora</th>
              <th scope="col">teléfono</th>
              <th scope="col">Evento</th>
              <th scope="col">Notificación</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($resultado as $row):?>
            <tr class="">
              <td  style="display: none;" scope="row"><? echo $row["id"]; ?></td>
              <td  style="display: none;" scope="row"><? echo $row["id_posible"]; ?></td>
              <td><?php echo $row["nombre"]; ?></td>
              <td><?php echo $row["title"]; ?></td>
              <td><?php echo $row["tel"]; ?></td>
              <td><?php echo $row["email"]; ?></td>
              <td><?php echo $row["start"]; ?></td>
              <td><?php echo $row["tel"]; ?></td>
              <td>Agendado</td> 
              <td><a type="button" href="not.php?id_posible=<?php echo $row["id_posible"];?>" class="btn btn-primary">Notificar por email</a></td>
              <td><a type="button" href="llam.php?id=<?php echo $row["id"];?>" class="btn btn-info">Notificado por llamada</a></td>
            </tr>
            <?php endforeach; ?>       
          </tbody>
        </table>
      </div>
    </div>
  </div><br><br>
  <!-- empieza tabla 2 -->
  <div class="container">
    <div class="col-md-12">
    <h4>Notificadas</h4>
      <div class="table-responsive">
        <table class="table" id="notificadas">
          <thead class="table-dark">
            <tr>
              <th style="display: none;" scope="col">Id</th>
              <th scope="col">Actor</th>
              <th scope="col">Nombre de la reunion</th>
              <th scope="col">Personaje</th>
              <th scope="col">Correo</th>
              <th scope="col">Fecha y hora</th>
              <th scope="col">teléfono</th>
              <th scope="col">Evento</th>
              <th scope="col">Notificación</th>

            </tr>
          </thead>
          <tbody>
          <?php foreach ($resultado2 as $row):?>
            <tr class="">
              <td  style="display: none;" scope="row"><? echo $row["id"]; ?></td>
              <td  style="display: none;" scope="row"><? echo $row["id_posible"]; ?></td>
              <td><?php echo $row["nombre"]; ?></td>
              <td><?php echo $row["title"]; ?></td>
              <td><?php echo $row["tel"]; ?></td>
              <td><?php echo $row["email"]; ?></td>
              <td><?php echo $row["start"]; ?></td>
              <td><?php echo $row["tel"]; ?></td>
              <td>Agendado</td> 
              <td><button type="button" class="btn btn-outline-primary" disabled> Notificado</button></td>
            </tr>
            <?php endforeach; ?>       
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div><br><br>
  <!-- termina tabla 2 -->
   <!-- empieza  tabla 3 -->
   <div class="container">
    <div class="col-md-12">
    <h4>Agendadas libres</h4>
      <div class="table-responsive">
        <table class="table" id="libres">
          <thead class="table-dark">
            <tr>
              <th style="display: none;" scope="col">Id</th>
              <th scope="col">Actor</th>
              <th scope="col">Nombre de la reunion</th>
              <th scope="col">Motivo</th>
              <th scope="col">Importancia</th>
              <th scope="col">Fecha y hora</th>
              <th scope="col">Estatus</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($resultado3 as $row):?>
            <tr class="">
              <td  style="display: none;" scope="row"><? echo $row["id"]; ?></td>
              <td  style="display: none;" scope="row"><? echo $row["id_posible"]; ?></td>
              <td><?php echo $row["name"]; ?></td>
              <td><?php echo $row["title"]; ?></td>
              <td><?php echo $row["motivo"]; ?></td>
              <td><?php echo $row["color"]; ?></td>
              <td><?php echo $row["start"]; ?></td>
              <td>Agendado</td> 
            </tr>
            <?php endforeach; ?>       
          </tbody>
        </table>
      </div>
    </div>
  </div><br><br>

    <!-- termina tabla 3 -->

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="DataTables/datatables.js"></script>
    <script>
       $(document).ready( function () {
        
    $('#pendientes').DataTable();
    $('#notificadas').DataTable();
    $('#libres').DataTable();
} );

  </script>
  </body>
</html>
