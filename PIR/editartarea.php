<?php
include("conexion.php");

$id = $_POST['id'];
$tarea = $_POST['tarea'];
$reportero = $_POST['reportero'];
$hora = $_POST['hora'];


    $sqlgrabar = "UPDATE tareas set nombre='$tarea', reportero= '$reportero',hora = '$hora' where id like $id";
    $rta = mysqli_query($conn, $sqlgrabar);
    if(!$rta){
        echo"No se actualizo! ";
    }
    else{
        echo "<script> alert('Tarea actualizada!'); window.location='actividades.php' </script>";
    }
?>