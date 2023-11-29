<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma Informática de Gestión</title>
    <link rel="stylesheet" href="CSS/home.css">
    <link rel="stylesheet" href="CSS/styleC.css">
    
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
                    <a id="info" href="Acerca de.php">
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
        } else {
            header('location: login.html');
        }
        ?>
<!-- <div class="content">
    <div class="calendar-container">
      <div class="calendar"> 
        <div class="year-header"> 
          <span class="left-button" id="prev"> &lang; </span> 
          <span class="year" id="label"></span> 
          <span class="right-button" id="next"> &rang; </span>
        </div> 
        <table class="months-table"> 
          <tbody>
            <tr class="months-row">
              <td class="month">Ene</td> 
              <td class="month">Feb</td> 
              <td class="month">Mar</td> 
              <td class="month">Abr</td> 
              <td class="month">May</td> 
              <td class="month">Jun</td> 
              <td class="month">Jul</td>
              <td class="month">Agt</td> 
              <td class="month">Sep</td> 
              <td class="month">Oct</td>          
              <td class="month">Nov</td>
              <td class="month">Dic</td>
            </tr>
          </tbody>
        </table> 
        
        <table class="days-table"> 
          <td class="day">Dom</td> 
          <td class="day">Lun</td> 
          <td class="day">Mar</td> 
          <td class="day">Mié</td> 
          <td class="day">Jue</td> 
          <td class="day">Vie</td> 
          <td class="day">Sáb</td>
        </table> 
        <div class="frame"> 
          <table class="dates-table"> 
              <tbody class="tbody">             
              </tbody> 
          </table>
        </div> 
        <button class="button" id="add-button">Añadir tarea</button>
      </div>
    </div>
    <div class="events-container">
    </div>
    <div class="dialog" id="dialog">
        <h2 class="dialog-header"> Añadir nueva tarea </h2>
        <form class="form" id="form">
          <div class="form-container" align="center">
            <label class="form-label" id="valueFromMyButton" for="name">Nombre de la tarea</label>
            <input class="input" type="text" id="name" maxlength="36">
            <label class="form-label" id="valueFromMyButton" for="count">Horario</label>
            <input class="input" type="time" id="count" min="00:00" max="23:59"> 
            <input type="button" value="Cancel" class="button" id="cancel-button">
            <input type="button" value="OK" class="button" id="ok-button">
          </div>
        </form>
      </div>
  </div> -->

  <form action="registrartareas.php" method="post">
        <h2>Registrar actividades</h2>
        <input class="espacios" type="text" placeholder="Tarea" name="tarea" required><br><br>
        <input class="espacios" type="text" placeholder="Reportero" name="reportero" required><br><br>
        <input class="espacios" type="text" placeholder="Hora" name="hora" required><br><br>
        <input class="btn" type="submit" value="Registrar" name="btnregistrar"><br><br>
    </form>
    <a href="actividades.php">Regresar</a>        
    </main>

        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script> 
        <script src="JS/scripth.js"></script>

        <!-- Dialog Box-->
  <script
    src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous">
  </script>
  <!-- partial -->
  <script  src="JS/scriptC.js"></script>

</body>
</html>