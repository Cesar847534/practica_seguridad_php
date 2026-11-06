<?php
session_start();

// Crear el arreglo de usuarios si todavía no existe
if (!isset($_SESSION['usuarios'])) {
    $_SESSION['usuarios'] = [];
}

$mensaje = "";

// Comprobar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recuperar los datos del formulario
    $nombre = trim($_POST['nombre'] ?? '');
    $usuario = trim($_POST['usuario'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmar = $_POST['confirmar'] ?? '';

    // Validar que todos los campos estén completos
    if ($nombre == "" || $usuario == "" || $password == "" || $confirmar == "") {
        $mensaje = "Todos los campos son obligatorios.";
    }
    // Validar que la contraseña tenga al menos 6 caracteres
    elseif (strlen($password) < 6) {
        $mensaje = "La contraseña debe tener mínimo 6 caracteres.";
    }
    // Comprobar que las contraseñas coincidan
    elseif ($password != $confirmar) {
        $mensaje = "Las contraseñas no coinciden.";
    }
    // Comprobar que el usuario no esté registrado
    elseif (isset($_SESSION['usuarios'][$usuario])) {
        $mensaje = "Este nombre de usuario ya está registrado.";
    }
    else {

        // Proteger la contraseña mediante un hash
        $hash = password_hash($password, PASSWORD_DEFAULT);

        // Guardar los datos del usuario en el arreglo
        $_SESSION['usuarios'][$usuario] = [
            "nombre" => $nombre,
            "usuario" => $usuario,
            "password" => $hash
        ];

        $mensaje = "¡Registro exitoso! Ya puedes iniciar sesión.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    
    <!-- Conectar el archivo CSS -->
     <link rel="stylesheet" href="estilo.css">
</head>
<body>
     <h1>Registro de usuarios</h1>
     <img src="imagenes/registro.jpg" alt="Imagen de registro" class="imagen">

     <form method="POST" action="registro.php">
        <label>Nombre completo:</label>
        <input type="text" name="nombre" required>

        <label>Nombre de usuarios:</label>
        <input type="text" name="usuario" required>

        <label>Contraseña:</label>
        <input type="Password" name="password" required>

        <label>Confirmar contraseña:</label>
        <input type="password" name="confirmar" required>

        <button type="submit">Registrarse</button>
     </form>

     <p><?php echo htmlspecialchars($mensaje); ?></p>

     <p>
          ¿ya tienes una cuenta?
          <a href="login.php">Iniciar sesion</a>   
     </p>

</body>
</html>