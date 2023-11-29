<?php
include("conexion.php");

    $sqlgrabar = "TRUNCATE TABLE tareas";
    $rta = mysqli_query($conn, $sqlgrabar);
    if(!$rta){
        echo"No se eliminó! ";
    }
    else{
        echo "<script> alert('Tareas eliminadas!'); window.location='actividades.php' </script>";
    }
?>