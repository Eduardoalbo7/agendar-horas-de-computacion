<?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
        echo '
        <script>
            alert("Debes iniciar sesión para acceder a esta página.");
            windows.location = "index.php";
        </script>
        ';  
        
        session_destroy();
        die();
    }
    ?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        h1 {
            font-size: 3em;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Bienvenido a la página de reservas de salas de computación 2025</h1>
    <a href="php/cerrar_sesion.php">Cerrar Sesión</a>
</body>
</html>