<?php
include("conexion.php");

$tarea = $_POST['tarea'];
$reportero = $_POST['reportero'];
$hora = $_POST['hora'];


    $sqlgrabar = "INSERT INTO tareas(nombre,reportero,hora) values ('$tarea','$reportero','$hora')";
    $rta = mysqli_query($conn, $sqlgrabar);
    if(!$rta){
        echo"No se inserto! ";
    }
    else{
        echo "<script> alert('Tarea asignada!'); window.location='actividades.php' </script>";
    }
?>