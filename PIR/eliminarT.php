<?php
include("conexion.php");

$id = $_GET['id'];

    $sqlgrabar = "DELETE from tareas where id like $id";
    $rta = mysqli_query($conn, $sqlgrabar);
    if(!$rta){
        echo"No se eliminó! ";
    }
    else{
        echo "<script> alert('Tarea eliminada!'); window.location='actividades.php' </script>";
    }
?>