<?php 
include("componentes/conexion.php");

    $id = $_GET['id'];
    $sentenciaSQL= $pdo->prepare("UPDATE eventos SET estatus = 2 WHERE id = $id;");
    $sentenciaSQL->execute();
    //insertar
    echo"<script type=\"text/javascript\">alert('listo :)'); window.location='agendados.php';</script>";


?>