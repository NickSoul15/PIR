<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pruebacorreo</title>
    <link rel="stylesheet" href="CSS\style.css">
</head>
<body>
<main>
<table border="1">
            <tr>
                <td>Usuario</td>
                <td>Password encriptada</td>
                <td>Nombre</td>
                <td>Rol</td>
            </tr>
            <?php
            include('conexion.php');

            $correo = $_POST['email'];
            $mail=$_POST['email'];
            
            $queryusuario 	= mysqli_query($conn,"SELECT * FROM login WHERE correo = '$correo'");
            $nr 			= mysqli_num_rows($queryusuario); 
            if ($nr == 0)
            {echo "<script> alert('Este correo no está registrado');window.location= 'recuperar.php' </script>";
            
            }
            
                $sql = "SELECT id,usuario,password,nombre,rol FROM login where correo like '$mail' '%' ";
                $rta = mysqli_query($conn, $sql);
                while ($mostrar = mysqli_fetch_row($rta)) {
                ?>
                    <tr>
                        <td><?php echo $mostrar['1'] ?></td>
                        <td><?php echo $mostrar['2'] ?></td>
                        <td><?php echo $mostrar['3'] ?></td>
                        <td><?php echo $mostrar['4'] ?></td>
                        <td><a href="cambiopass.php?
                        id=<?php echo $mostrar['0'] ?> &
                        pass=<?php echo $mostrar['1'] ?>
                        ">Cambiar contraseña</a></td>
                    </tr>
                <?php
                }
                ?>
            </table>
            <br>
            Se muestra la información de su cuenta.
        </main>
            
        

</body>
</html>