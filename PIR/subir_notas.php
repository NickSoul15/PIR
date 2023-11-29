<?php
include("conexion.php");

$nombre = $_POST['usuario'];
$asunto = $_POST['asunto'];
$status = $_POST['status'];
$imagen = $_FILES['imagen'] ['name'];
$archivo = $_FILES['imagen'] ['tmp_name'];
$ruta = "imagenes";
$ruta = $ruta."/".$imagen;
move_uploaded_file($archivo,$ruta);

    $sqlgrabar = "INSERT INTO notas(imagen,reportero,asunto,status) values ('$ruta','$nombre','$asunto','$status')";
     $rta = mysqli_query($conn, $sqlgrabar);
     if(!$rta){
         echo"No se inserto! ";
     }
     else{
        echo "<script> alert('Nota creada!'); window.location='notas.php' </script>";
     }
?>
