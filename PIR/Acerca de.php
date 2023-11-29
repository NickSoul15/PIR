<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acerca de</title>
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
            <li><a href="Admin.php">Inicio</a></li>
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

<article class="mision">
        <h1>
            Nuestra obligación y compromiso
        </h1>

        <p class="filosofia">     
            Trato amable, atento y digno a los Residentes y sus visitas 
            y Transparencia total en el ejercicio del gasto y manejo 
            de activos del condominio.
        </p>


    </article>

    <h1 class="titulo">Conce nuestra gama de servicios</h1>

    <div class="conteiner">

        <div class="card">
            <div class="header">
               
                    <img src="CSS\Imagenes\administracion.jpg">
             
                <h2>Servicios Administrativos</h2>
                <h4>Contamos con:</h4>
            </div>
            <div class="descripcion">
                <p>servicios como administracion de recursos monetarios o tramites de gobierno entre muchos otros</p>
           
            </div>
        </div>

        <div class="card">
            <div class="header">
               
                    <img src="CSS\Imagenes\mantenimiento.jpg">
             
                <h2>Servicios de mantenimiento</h2>
                <h4>Contamos con</h4>
            </div>
            <div class="descripcion">
                <p>servicios como limpieza del inmueble, inperbiabilizacion o pintura entre muchos otros</p>
           
            </div>
        </div>

        <div class="card">
            <div class="header">
               
                    <img src="CSS\Imagenes\vigilancia.jpg">
             
                <h2>Servicios de vigilancia</h2>
                <h4>Contamos con:</h4>
            </div>
            <div class="descripcion">
                <p>Servicios como control de accesos o protocolos de accion entre muchos otros</p>
           
            </div>
        </div>


        </div>

        <div class="conteiner">

            <div class="card">
                <div class="header">
                   
                        <img src="CSS\Imagenes\convivencia.jpg">
                 
                    <h2>Servicios de convivencia</h2>
                    <h4>Contamos con:</h4>
                </div>
                <div class="descripcion">
                    <p>Servicios como difucion de reglamento o seguimiento y cumplimiento de acuerdos entre muchos otros</p>
               
                </div>
            </div>
    
            <div class="card">
                <div class="header">
                   
                        <img src="CSS\Imagenes\otros.jpg">
                 
                    <h2>Servicios opcionales</h2>
                    <h4>Contamos con:</h4>
                </div>
                <div class="descripcion">
                    <p>Servicios como suministro y cobro de gas lp, pulido de pisos entre muchos otros</p>
               
                </div>

        </div>
    
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
