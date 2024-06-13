<?php
include("componentes/conexion.php");
?>
<!doctype html>
<html lang="en">
<head> 
  <title>HPM | Agenda</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS v5.2.0-beta1 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.css">
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/locales-all.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link href="componentes/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
</head>
<body><br><br>
<div class="container">
    <div class="row">
      <div class="col-md-2 offset-6">
      <a class="btn btn-primary" type="button" href="index.php">Volver a pendientes</a>
      </div>
      <div class="col-md-2">
      <a class="btn btn-primary" type="button" href="agendados.php">Agendados</a>
      </div>
      <div class="col-md-2">
        <a class="btn btn-primary" type="button" href="logout.php">Salir</a>
      </div>
    </div>
  </div><br>
  <div class="container">
    <div class="col-md-10 offset-1">
      <div id='calendario'></div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="modalEvento" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content"><br><br>
         <!-- inicio Card de datos -->
    
          <!-- Termina Card de datos -->
        <div class="modal-header">
          <h5 class="modal-title">Registro del evento </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <form action="" method="post">
              <div class="mb-3 visually-hidden ">
                <label for="id" class="form-label">ID:</label>
                <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="ID">
              </div>
              <div class="mb-3">
                <label for="titulo" class="form-label">Nombre de la reunión</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Título">
              </div>
              <div class="mb-3">
                <label for="titulo" class="form-label">Personaje /s</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="Personaje">
              </div>
              <div class="mb-3 visually-hidden">
                <label for="" class="form-label">Fecha:</label>
                <input type="text" class="form-control" name="fecha" id="fecha" aria-describedby="helpId" placeholder="Fecha:">
              </div>
              <div class="mb-3">
                <label for="hora" class="form-label">Hora del evento:</label>
                <input type="time" class="form-control" name="hora" id="hora" aria-describedby="helpId" placeholder="Hora:">
              </div>
              <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" name="motivo" id="motivo" rows="3"></textarea>
              </div>
              <div class="mb-3">
                <label for="color" class="form-label">Importancia de la reunión:</label>
                <select name="color" id="color">
                  <option value="#FFE075">Ordinaria</option>
                  <option value="#1430E2">Importante</option>
                  <option value="#E21A14">Muy importante</option>
                </select>
              </div>
              <div class="mb-3 visually-hidden">
                <label for="estatus" class="form-label"></label>
                <input class="form-control" name="estatus" id="estatus" value="1"></input>
              </div>
              <div class="mb-3 visually-hidden">
                <label for="id_posible" class="form-label"></label>
                <input class="form-control" name="id_posible" id="id_posible" value="0"></input>
              </div>
            </form>
          </div>
        </div> 
        <div class="modal-footer">
          <button type="button" onclick="borrarEvento()" class="btn btn-danger" id="btnBorrar" data-bs-dismiss="modal">Borrar</button>
          <button type="button" onclick="agregarEvento()" id="btnGuardar" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap JavaScript Libraries -->
  <script type="text/javascript" src="componentes/sweetalert2/sweetalert2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  <script src="calendar/calendario2.js"></script>
</body>
</html>