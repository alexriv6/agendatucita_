<?php

header("Content-Type: application/json");
$pdo=new PDO("mysql:host=localhost;dbname=hpmmx_eventos","hpmmx_admin_sys","adminsystemA123@");

$accion=(isset($_GET['accion']))?$_GET['accion']:'leer';
switch($accion){

    case 'leer':
        $sentenciaSQL= $pdo->prepare("SELECT * FROM eventos");
        $sentenciaSQL->execute();
        $resultado=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($resultado));

    break;   
    case 'agregar':
       
$sentenciaSQL= $pdo->prepare("INSERT INTO eventos (id, title, name, motivo, color, start, end, estatus, id_posible) VALUES (NULL, :title, :name, :motivo, :color, :start, :end, :estatus, :id_posible);");
$sentenciaSQL->execute(array(
    "title"=>$_POST['title'],
    "name"=>$_POST['name'],
    "motivo"=>$_POST['motivo'],
    "color"=>$_POST['color'],
    "start"=>$_POST['fecha']." ".$_POST['hora'].":00",
    "end"=>$_POST['fecha']." ".$_POST['hora'].":00",
    "estatus"=>$_POST['estatus'],
    "id_posible"=>$_POST['id_posible']
));
        //insertar
        print_r($_POST);


    break;

    case 'borrar':
        $sentenciaSQL= $pdo->prepare("DELETE FROM eventos WHERE id=:id");
        $sentenciaSQL->execute(array(
            "id"=>$_POST['id']
        ));
        print_r($_POST);
    break;

    case 'actualizar':
        $sentenciaSQL= $pdo->prepare("UPDATE eventos SET title = :title, name =:name, motivo = :motivo, color=:color, motivo=:motivo, start=:start, end=:end WHERE id=:id");
        $sentenciaSQL->execute(array(
            "title"=>$_POST['title'],
            "name"=>$_POST['name'],
            "motivo"=>$_POST['motivo'],
            "color"=>$_POST['color'],
            "start"=>$_POST['fecha']." ".$_POST['hora'].":00",
            "end"=>$_POST['fecha']." ".$_POST['hora'].":00",
            "id"=>$_POST['id']
        ));
}

//print_r($_POST);

?>