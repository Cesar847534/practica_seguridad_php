
# Sistema de registro e inicio de sesión

## Descripción
Proyecto desarrollado en PHP que permite registrar usuarios e iniciar sesión mediante contraseñas protegidas.

## Características
- Registro de usuarios.
- Validación de campos.
- Confirmación de contraseñas.
- Protección mediante password_hash().
- Verificación mediante password_verify().
- Diseño con CSS.

## Tecnologías utilizadas
- HTML
- CSS
- PHP
- Git
- GitHub

## Instalación
1. Colocar la carpeta del proyecto dentro de htdocs.
2. Iniciar Apache desde XAMPP.
3. Abrir http://localhost/practica_seguridad.php/registro.php


## Funcionamiento del sistema

### Registro
1. El usuario ingresa su nombre completo.
2. Escribe un nombre de usuario.
3. Captura y confirma su contraseña.
4. El sistema valida los datos.
5. La contraseña se protege utilizando password_hash().

### Inicio de sesión
1. El usuario escribe su nombre de usuario.
2. Ingresa su contraseña.
3. El sistema busca al usuario registrado.
4. Utiliza password_verify() para comprobar la contraseña.
5. Muestra si el acceso fue autorizado o rechazado.

## Pruebas realizadas
- Registro de usuarios.
- Validación de campos vacíos.
- Validación de contraseñas.
- Comprobación de contraseñas incorrectas.
- Inicio de sesión correcto.

## Almacenamiento
Los usuarios se guardan en un arreglo de PHP mediante sesiones.
Los datos no se almacenan permanentemente en una base de datos.
