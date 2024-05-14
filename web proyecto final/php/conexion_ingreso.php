<?php
// Obtener los datos del formulario
$Correo_electronico = $_POST['Correo_electronico'];
$contrasenaa = $_POST['contrasenaa'];

// Establecer la conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "login_register_db");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Insertar los datos del usuario en la tabla usuarios
$sql = "INSERT INTO inicio_sesion (Correo_electronico, contrasenaa) VALUES ('$Correo_electronico', '$contrasenaa')";

if ($conexion->query($sql) === TRUE) {
    echo "Los datos se han guardado en la base de datos correctamente";
} else {
    echo "Error al guardar los datos: " . $conexion->error;
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>