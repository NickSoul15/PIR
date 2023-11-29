<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contraseña</title>
    <link rel="stylesheet" href="CSS\style.css">
</head>
<body>
    <!-- <div class="formulario">
    <form action="enviarcorreo.php" method="post">
        <h2>Recuperar contraseña</h2>
        <input class="campos" type="email" placeholder="Ingrese su correo" name="email" required><br><br>
        <input class="btn" type="submit" value="Enviar contraseña" name="btnenviar" onClick="javascript: return confirm('¿Deseas enviar tu contraseña a tu correo?');">
        <a href="login.html">Regresar</a>
        <br>
    </form>
    </div> -->

    <div class="formulario">
    <form action="correo.php" method="post">
        <h2>Recuperar contraseña</h2>
        <input class="campos" type="email" placeholder="Ingrese su correo" name="email" required><br><br>
        <input class="btn" type="submit" value="Buscar cuenta" name="btnenviar">
        <a href="login.html">Regresar</a>
        <br>
    </form>
    </div>

</body>
</html>
