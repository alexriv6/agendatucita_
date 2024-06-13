<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>HPM | Agenda tu cita</title>
</head>
<body>
      <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
        </div>
      </nav><br>
      <?php require('app/afc.php'); ?>
      <?php require('app/aj.php'); ?>
      <div class="container text-center offset-1">
        <div class="row">
          <div class="col-auto">
            <div class="card" style="width: 30rem;">
                <img src="assets/img/4.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Asesoría financiera - contable</h5>
                    <br>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#afc">Agendar mi cita</button>
                </div>
              </div>
          </div><br>
          <div class="col-auto">
            <div class="card" style="width: 30rem;">
                <img src="assets/img/1.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Asesoría jurídica</h5>
                  <br>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#aj">Agendar mi cita</button>
                </div>
              </div>
          </div><br>
        </div>
      </div>
</body>
</html>