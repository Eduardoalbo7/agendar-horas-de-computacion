<?php

session_start();
include 'conexion_be.php';

$correo = $_POST['correo'];
$contresena = $_POST['contresena'];
$contrasena = hash('sha512', $contresena);
$validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo'
and contrasena='$contresena'");

if(mysqli_num_rows($validar_login) > 0){
    $_SESSION['usuario'] = $correo;
    header("location:../bienvenida.php");
    exit();
} else{
    echo '
        <script>
            alert("Usuario no encontrado, por favor verifique los datos introducidos");
            window.location = "../index.php";
        </script>
    ';
    exit();
}
?>

