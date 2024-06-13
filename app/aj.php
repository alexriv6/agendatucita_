<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
  <title>HPM | Agenda tu cita</title>
</head>
<body>
  <div class="modal fade" id="aj" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="afc">ASESORÍA JURÍDICA</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="app/agendar1.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Nombre completo:</label>
              <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Teléfono:</label>
              <input type="text" class="form-control" id="tel" name="tel" placeholder="Ej: 4495558878">
            </div>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Correo electrónico:</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Ej: holasoyalguien@mail.com">
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Motivo de la visita</label>
              <textarea class="form-control" name="motivo" id="motivo"></textarea>
            </div>
            <div class="mb-3">
              <label for="date" >Fecha  para agendar su posible cita</label><br><br>
              <input type="date" name="date"  class="col-form-label">
            </div>
            <div class="mb-3">
              <label for="date" >Hora para agendar su posible cita</label><br><br>
              <input type="time" name="time"  class="col-form-label">
            </div>
            <div class="mb-3 visually-hidden">
              <label for="estatus"></label><br><br>
              <input type="estatus" name="estatus" value="1" class="col-form-label">
            </div>
            <div class="mb-3 visually-hidden">
              <label for="estatus"></label><br><br>
              <input type="materia" name="materia" value="Jurídica" class="col-form-label">
            </div>
            <input type="text" name="materia" style="display:none;" value="Jurídica">
            <center> <button type="submit" name="guardar" id="guardar" class="btn btn-danger">Guardar</button></center> <br><br>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>