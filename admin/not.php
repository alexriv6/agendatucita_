<?php
include("componentes/conexion.php");
$id_posible = $_GET['id_posible'];

// $eventos= $pdo->prepare("SELECT e.id, p.id_posible FROM eventos AS e, posibles AS p WHERE e.id_posible = p.id_posible;");
// $eventos->execute();
// $resultado=$eventos->fetchAll(PDO::FETCH_ASSOC);

$eventos2= $pdo->prepare("SELECT * FROM posibles WHERE id_posible = $id_posible;");
$eventos2->execute();
$resultado2=$eventos2->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">

<head>
  <title>Email</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<body><br><br>
    
      <div class="">
      <?php foreach ($resultado2 as $row2):?>
      <form action="phpmail/correo.php" method="POST" name="formEmail">
            <div class="col-md-8 offset-md-2">
            <div class="mb-3 visually-hidden">
                <label for="destino" class="form-label">id</label>
                <input type="text" class="form-control" name="id_posible" id="id_posible" value="<?php echo $row2['id_posible']; ?>">
              </div>
              <div class="mb-3">
                <label for="destino" class="form-label">Correo de destino</label>
                <input type="text" class="form-control" name="destino" id="destino" value="<?php echo $row2['email']; ?>">
              </div>
              <div class="mb-3">
                <label for="persona" class="form-label">Nombre del destino</label>
                <input type="text" class="form-control" name="persona" id="persona"  value="<?php echo $row2['nombre']; ?>">
              </div>
              <div class="mb-3">
                <label for="asunto" class="form-label">Asunto</label>
                <input type="text" class="form-control" name="asunto" id="asunto" value="ConfirmaciÃ³n de cita">
              </div>
              <div class="mb-3">
                <label for="cuerpo" class="form-label">Cuerpo</label>
                <textarea class="form-control" name="cuerpo" id="cuerpo" cols="30" rows="10">Estimado/a <?php echo $row2['nombre']; ?>, le comentamos que su cita para el d¨ªa seleccionado, ha sido.... </textarea>
              </div>
              <div class="mb-3">
                <button type="submit" class="btn btn-success">Enviar</button>
              </div>
            </div>
          </form>
          <?php endforeach; ?> 
      </div>
      <div class="">
        <a type="button" href="agendados.php" class="btn btn-secondary" >Cancelar</a>
      </div>
    </div>
  </div>
</div>
  <header>
    <!-- place navbar here -->
  </header>
  <main>

  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>
