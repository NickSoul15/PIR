<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma Informática de Gestión</title>
    <link rel="stylesheet" href="CSS/home.css">
    <link rel="stylesheet" href="CSS/styleC.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
<div class="menu">
        <ion-icon name="menu-outline"></ion-icon>
        <ion-icon name="close-outline"></ion-icon>
    </div>
    <!-- menu Lateral -->
    <div class="barra-lateral">
    <!-- Cabezera de barra lateral -->
        <div>
            <div class="nombre-pagina">
                <ion-icon id="radio" name="radio-outline"></ion-icon>
                <span>PIG RadioEdu</span>
            </div>
            <button class="boton">
                <ion-icon name="add-circle-outline"></ion-icon>
                <span>Menu</span>
            </button>
        </div>
     <!-- menu de opciones/navegacion -->
        <nav class="navegacion">
            <ul>
                <li>
                    <a id="inbox" href="Admin.php">
                        <ion-icon name="cafe-outline"></ion-icon>
                        <span>Inicio</span>
                    </a>
                </li>
                <li>
                    <a id="inbox" href="consultas.php">
                        <ion-icon name="mail-outline"></ion-icon>
                        <span>Consulta de notas</span>
                    </a>
                </li>
                <li>
                    <a id="calendar" href="actividades.php">
                        <ion-icon name="calendar-number-outline"></ion-icon>
                        <span>Calendario</span>
                    </a>
                </li>
                <li>
                    <a id="info" href="Acercade.php">
                        <ion-icon name="information-circle-outline"></ion-icon>
                        <span>Información</span>
                    </a>
                </li>
                <li>
                    <a id="user" href="cerrar_sesion.php">
                        <ion-icon name="person-outline">
                            <input type="submit" value="cerrar sesion" name="btncerar"></input>
                        </ion-icon>
                        <span>Cerrar Sesión</span>
                    </a>
                </li>
            </ul>
        </nav>
<!-- Parte inferior de la barra lateral -->
        <div>
            <div class="linea"></div>

            <div class="modo-oscuro">
                <div class="info">
                    <ion-icon name="moon-outline"></ion-icon>
                    <span>Dark Mode</span>
                </div>
                <div class="switch">
                    <div class="base">
                        <div class="circulo">

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <main>
    <div class="container text-center my-3">
<table class="table table-bordered table-striped table-warning">
        <tr>
            <td>Reportero</td>
            <td>Asunto</td>
            <td>Status</td>
            <td>Imagen</td>
        </tr>
        <?php
include("conexion.php");
        
        $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
        
        if(!$conn){
            die("No hay conexion:" .mysqli_connect_error());
        }
        $sql= "SELECT reportero,asunto,status,imagen FROM notas";
        $rta= mysqli_query($conn, $sql);
        while($mostrar = mysqli_fetch_row($rta)){
        ?>
        <tr>
            <td><?php echo $mostrar['0'] ?></td>
            <td><?php echo $mostrar['1'] ?></td>
            <td><?php echo $mostrar['2'] ?></td>
            <td><img style="height: 200px;" class="img-fluid" src="<?php echo $mostrar['3'] ?>"></td>
        </tr>
        <?php
        }
        ?>
    </table>
</div>
        <b>Se presentan las consultas para revisión de información. </b>
    </main>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="JS/scripth.js"></script>

    <!-- Dialog Box-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous">
    </script>
    <!-- partial -->
    <!-- <script src="JS/scriptC.js"></script> -->

</body>

</html>