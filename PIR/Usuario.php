<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma Informática de Gestión</title>
    <link rel="stylesheet" href="CSS/home.css">
    
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
                    <a id="inbox" href="Usuario.php">
                        <ion-icon name="cafe-outline"></ion-icon>
                        <span>Inicio</span>
                    </a>
                </li>
                <li>
                    <a id="calendar" href="calendario.php">
                        <ion-icon name="calendar-number-outline"></ion-icon>
                        <span>Calendario</span>
                    </a>
                </li>
                <li>
                    <a id="act" href="notas.php">
                        <ion-icon name="newspaper-outline"></ion-icon>
                        <span>Crear Notas</span>
                    </a>
                </li>
                <li>
                    <a id="info" href="informacion.php">
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
    <?php
        session_start();
        if (isset($_SESSION['nombre_usuario'])) {

            $usuarioingresado = $_SESSION['nombre_usuario'];
            echo "<h2>Bienvenido: $usuarioingresado </h2>";
        } else {
            header('location: login.html');
        }


        ?>

        <h2>Plataforma Informática de Gestión RadioEduca</h2>
    </main>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="JS/scripth.js"></script>

</body>

</html>