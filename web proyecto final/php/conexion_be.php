<?php
// Obtener los datos del formulario
$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Establecer la conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "login_register_db");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Insertar los datos del usuario en la tabla usuarios
$sql = "INSERT INTO usuarios (nombre_completo, correo, usuario, contrasena) VALUES ('$nombre_completo', '$correo', '$usuario', '$contrasena')";

if ($conexion->query($sql) === TRUE) {
    echo "Los datos se han guardado en la base de datos correctamente";
} else {
    echo "Error al guardar los datos: " . $conexion->error;
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>