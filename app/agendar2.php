<?php 
include("../admin/componentes/conexion.php");

if (isset($_POST['guardar'])) {
    $sentenciaSQL= $pdo->prepare("INSERT INTO posibles (nombre, motivo, date, time, tel, email, estatus, materia) VALUES (:nombre, :motivo, :date, :time, :tel, :email, :estatus, :materia);");
    $sentenciaSQL->execute(array(
        "nombre"=>$_POST['nombre'],
        "motivo"=>$_POST['motivo'],
        "date"=>$_POST['date'],
        "time"=>$_POST['time'],
        "tel"=>$_POST['tel'],
        "email"=>$_POST['email'],
        "estatus"=>$_POST['estatus'],
        "materia"=>$_POST['materia']
    ));
    //insertar
    echo"<script type=\"text/javascript\">alert('En breve nos comunicamos con usted para confirmar tu cita, por favor, esté al pendiente a su correo electrónico y llamadas telefónicas. '); window.location='../index.php';</script>";
}

?>
