<?php
include("conexion.php");

$id = $_POST['id'];
$pass = sha1($_POST['pass']);

    $sqlgrabar = "UPDATE login set password='$pass' where id like $id";
    $rta = mysqli_query($conn, $sqlgrabar);
    if(!$rta){
        echo"No se actualizo! ";
    }
    else{
        echo "<script> alert('Contraseña actualizada!'); window.location='login.html' </script>";
    }
?>