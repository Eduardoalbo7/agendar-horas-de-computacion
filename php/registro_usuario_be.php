<?php

include 'conexion_be.php';

// Ensure $conexion is defined
if (!isset($conexion)) {
    die("Error: No se pudo conectar a la base de datos.");
}

$nombre_completo = $_POST['nombre_completo'] ?? '';
$correo = $_POST['correo'] ?? '';
$usuario = $_POST['usuario'] ?? '';
$contrasena = $_POST['contrasena'] ;

// Hashing encritada de contreseña using SHA-512
$contrasena = hash('sha512', $contrasena);

// Prepare and bind the SQL statement
$query = "INSERT INTO usuarios(nombre_completo, correo, usuario, contrasena) 
          VALUES ('$nombre_completo', '$correo', '$usuario', '$contrasena')";


//verificar no se repita Correo en base de datos//
$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo' ");
if(mysqli_num_rows($verificar_correo) > 0){
    echo '
        <script> 
            alert("Este correo ya está registrado, intenta con otro diferente"); 
            window.location = "../index.php"; 
        </script>
    ';
    exit();
}

//verificar no se repita USUARIO en base de datos//
$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$usuario' ");
if(mysqli_num_rows($verificar_usuario) > 0){
    echo '
        <script> 
            alert("Este usuario ya está registrado, intenta con otro diferente"); 
            window.location = "../index.php"; 
        </script>
    ';
    exit();
}

$ejecutar = mysqli_query($conexion, $query);

if($ejecutar) {
    echo '
        <script> 
                alert("Usuario almacenado correctamente"); 
                window.location = "../index.php"; 
            </script>;
    ';
              
} else{

    echo ' 
        <script>("Inténtalo de nuevo, usuario no almacenado"); 
        window.location = "../index.php"; 
    </script>
    ';
    
}

mysqli_close($conexion); // cerrar la conexion con la base de datos
?>