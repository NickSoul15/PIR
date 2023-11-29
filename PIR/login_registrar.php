<?php



include("conexion.php");

$nombre = $_POST['usuario'];
$pass = sha1($_POST['pass']);
$nomb = $_POST['nombre'];
$mail = $_POST['correo'];
$rol = $_POST['rol'];

//txtusuario

//(($nr==1)&&(password_verify($pass,$buscarpass['pass'])))
//Registro
if(isset($_POST['btnregistrar'])){



	$queryusuario 	= mysqli_query($conn,"SELECT * FROM login WHERE correo = '$mail'");
	$nr 			= mysqli_num_rows($queryusuario); 
	if ($nr !=0)
	{
		echo "<script> alert('Este correo ya está registrado');window.location= 'registro.html' </script>";
	}else{

		   $sqlgrabar = "INSERT INTO login(usuario,password,nombre,correo,rol) values ('$nombre','$pass','$nomb','$mail','$rol')";
    if(mysqli_query($conn,$sqlgrabar)){
        echo "<script> alert('Usuario registrado con exito: $nombre'); window.location='login.html' </script>";
    }else{
        echo "Error ".$sqlgrabar."<br>".mysql_error($conn);
    }

	}

}




//Login
if(isset($_POST['btningresar'])){
    $queryusuario = mysqli_query($conn,"SELECT * FROM login WHERE usuario ='$nombre' and password = '$pass' and rol = '$rol'");
$nr 		= mysqli_num_rows($queryusuario);  
if(!isset($_SESSION['nombre_usuario'])){	
	
if ($nr == 1 )  
	{ 
		if($rol=="Usuario")
			{	
				session_start();
				$_SESSION['nombre_usuario']=$nombre;
			echo "<script> alert('Bienvenido usuario $nombre'); window.location='Usuario.php' </script>";
			}
		else if ($rol=="Admin")
			{
				session_start();
				$_SESSION['nombre_usuario']=$nombre;
				echo "<script> alert('Bienvenido Administrador $nombre'); window.location='Admin.php' </script>";
			}
	}
else
	{
	echo "<script> alert('Usuario, contraseña o rol incorrecto.');window.location= 'login.html' </script>";
	}
}

/*VaidrollTeam*/


//     $query = mysqli_query($conn, "SELECT * FROM login WHERE usuario = '$nombre' AND password='$pass'");
//     $nr = mysqli_num_rows($query);

//     if(!isset($_SESSION['nombre_usuario'])){

//     if($nr == 1){
//         $_SESSION['nombre_usuario']=$nombre;
//         echo "<script> alert('Bienvenido $nombre'); window.location='home.php' </script>";
//     }else{
//         echo "<script> alert('Usuario o contraseña incorrecto'); window.location='login.html'  </script>";
//     }
// }
}





?>