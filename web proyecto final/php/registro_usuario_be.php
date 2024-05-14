<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["nombre_completo"]) && isset($_POST["correo"]) && isset($_POST["usuario"]) && isset($_POST["contrasena"])) {
        // Aquí puedes acceder a los datos del formulario de manera segura
        $nombre_completo = $_POST["nombre_completo"];
        $correo = $_POST["correo"];
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];

        // Establecer la conexión a la base de datos
        $conexion = new mysqli("localhost", "root", "", "login_register_db");

        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        // Insertar los datos del usuario en la tabla usuarios
        $sql = "INSERT INTO usuarios (nombre_completo, correo, usuario, contrasena) VALUES ('$nombre_completo', '$correo', '$usuario', '$contrasena')";

        if ($conexion->query($sql) === TRUE) {
            echo "El usuario se ha registrado correctamente";
        } else {
            echo "Error al registrar el usuario: " . $conexion->error;
        }

        // Cerrar la conexión a la base de datos
        $conexion->close();
    } else {
        echo "Por favor completa todos los campos del formulario";
    }
} else {
    echo "No se recibieron datos del formulario";
}
?>