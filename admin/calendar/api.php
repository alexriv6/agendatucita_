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
        
        $id_posible = $_GET['id_posible'];
        $title =$_POST['title'];
        $name = $_POST['name'];
        $motivo = $_POST['motivo'];
        $color = $_POST['color'];
        $start = $_POST['fecha']." ".$_POST['hora'].":00";
        $end = $_POST['fecha']." ".$_POST['hora'].":00";
        $estatus= $_POST['estatus'];
        $id_posible = $_POST['id_posible'];
            
        $sentencia = $pdo->prepare("CALL insertar_evento5 (?, ?, ?, ?, ?, ?, ?, ?)");
        $sentencia->bindParam(1,$title, PDO::PARAM_STR_CHAR);
        $sentencia->bindParam(2,$name, PDO::PARAM_STR_CHAR);
        $sentencia->bindParam(3,$motivo, PDO::PARAM_STR_CHAR);
        $sentencia->bindParam(4,$color, PDO::PARAM_STR_CHAR);
        $sentencia->bindParam(5,$start, PDO::PARAM_STR_CHAR);
        $sentencia->bindParam(6,$end, PDO::PARAM_STR_CHAR);
        $sentencia->bindParam(7,$estatus, PDO::PARAM_STR_CHAR);
        $sentencia->bindParam(8,$id_posible, PDO::PARAM_STR_CHAR);
        $sentencia->execute();
           
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