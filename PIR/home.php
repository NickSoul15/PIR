<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universal</title>
    <link rel="stylesheet" href="CSS\condominio.css">
</head>
<body>
    <header>
        <div class="logo">
                <img src="CSS\Imagenes\logo.jpg">
                <h2 class="nombrecompañia">Universal</h2>
        </div>
        <nav>
        <ul class="menu">
            <li><a href="home.php">Inicio</a></li>
            <li><a href="contratar.php">Contratar</a></li>
            <li><a href="Acerca de.php">Acerca de</a></li>
            <li>
            <form method="Post">
        <input type="submit" value="cerrar sesion" name="btncerrar">
    </form>
            </li>
            <li>
            <form action="" method="get">
                    <input type="text" name="busqueda">
                    <input type="submit" name="enviar" value="buscar">
                </form>
            </li>
        
        </ul>
</nav>
    </header>

    <?php
session_start();
if(isset($_SESSION['nombre_usuario'])){

    $usuarioingresado = $_SESSION['nombre_usuario'];
    echo"<h1>Bienvenido: $usuarioingresado </h1>";
}else{
    header('location: login.html');
}

if(isset($_POST['btncerrar'])){

    session_destroy();
    header('location: index.html');

}

    ?>

 <article class="descripcion">
        <h1>
            Admiministradora Universal
        </h1>

        <p>     
En Administradora Universal nos especializamos en 
solucionar y mejorar la calidad de los servicios que actualmente recibes
 en tu condominio así como aprovechar al máximo los recursos monetarios 
 y activos fijos con la finalidad de mejorar la calidad de vida de todos 
 los condóminos.
        </p>


    </article>
    
</body>
</html>
<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "universal";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!$conn){
    die("No hay conexion:" .mysqli_connect_error());
}


if(isset($_GET['enviar'])){
    $busqueda = $_GET['busqueda'];

    $consulta= $conn->query("SELECT * FROM servicios WHERE tipos LIKE '%busqueda%'");
    while ($row = $consulta->fetch_array()){
        echo $row['tipos'].'<br>';
    }
}

?>
