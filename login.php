<?php
// Iniciar la sesión para recuperar los usuarios registrados
session_start();

// Variable para mostrar mensajeel resultado del inicio de sesion
$mensaje = "";

// Comprobar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recuperar los datos ingresados
    $usuario = trim($_POST['usuario']);
    $password = $_POST['password'];

// Validar que los campos no estén vacíos
if ($usuario == "" || $password == "") {

    $mensaje = "Debes completar todos los campos.";

}
// Buscar si el usuario existe
elseif (isset($_SESSION['usuarios'][$usuario])) {

    // Recuperar el hash de la contraseña
    $hash = $_SESSION['usuarios'][$usuario]['password'];

    // Verificar la contraseña
    if (password_verify($password, $hash)) {

        $nombre = $_SESSION['usuarios'][$usuario]['nombre'];

        $mensaje = "Acceso autorizado. ¡Bienvenido, " .
                   htmlspecialchars($nombre) . "!";

    } else {

        $mensaje = "Acceso rechazado. Contraseña incorrecta.";

    }

} else {

    $mensaje = "Acceso rechazado. El usuario no existe.";

}

        // Recuperar el hash de la contraseña
        $hash = $_SESSION['usuarios'][$usuario]['password'];

        // Verificar la contraseña
        if (password_verify($password, $hash)) {
            $nombre = $_SESSION['usuarios'][$usuario]['nombre'];

            $mensaje = "Acceso autorizado. ¡Bienvenido, " .
                       htmlspecialchars($nombre) . "!";
        } else {
            $mensaje = "Acceso rechazado. Contraseña incorrecta.";
        }

    } else {
        $mensaje = "Acceso rechazado. El usuario no existe.";
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de sesión</title>

    <!-- Conectar el archivo CSS -->
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

    <h1>Iniciar sesión</h1>
    <img src="imagenes/login.jpg" alt="Imagen de inicio de sesión" class="imagen">

    <form method="POST" action="login.php">
        <label>Nombre de usuario:</label>
        <input type="text" name="usuario" required>

        <label>Contraseña:</label>
        <input type="password" name="password" required>

        <button type="submit">Iniciar sesión</button>

    </form>

    <p><?php echo $mensaje; ?></p>

    <p>
        ¿No tienes una cuenta?
        <a href="registro.php">Registrarse</a>
    </p>

</body>
</html>
