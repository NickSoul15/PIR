<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link rel="stylesheet" href="CSS\style.css">
</head>
<body>
    <?php
    $id = $_GET['id'];
    $pass = $_GET['pass'];

?>
    <div class="formulario">
    <form action="updatepass.php" method="post">
        <h2>Coloque una nueva contraseña</h2>
        <input class="espacios" type="text" style="visibility: hidden;" name="id" value="<?=$id?>"><br><br>
        <input class="espacios" type="password" placeholder="&#128274; Contraseña" name="pass" required><br><br>
        <div class="g-recaptcha" data-sitekey="6LelrbsoAAAAAMkudj0MwMxQXcbuBdVTay7MqNmz"></div><br><br>
        <input class="btn" type="submit" value="Actualizar" name="btnregistrar"> 
        <br>
        <a href="login.html">Regresar</a>
    </form>
    </div>
</body>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</html>