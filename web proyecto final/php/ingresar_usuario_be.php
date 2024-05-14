<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["Correo_electronico"]) && isset($_POST["contrasenaa"])) {
        // Aquí puedes acceder a los datos del formulario de manera segura
        $Correo_electronico = $_POST["Correo_electronico"];
        $contrasenaa = $_POST["contrasenaa"];

        // Establecer la conexión a la base de datos
        $conexion = new mysqli("localhost", "root", "", "login_register_db");

        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        // Insertar los datos del usuario en la tabla usuarios
        $sql = "INSERT INTO inicio_sesion (Correo_electronico,contrasenaa) VALUES ('$Correo_electronico','$contrasenaa')";

        if ($conexion->query($sql) === TRUE) {
            
            header("Location: Inicio.html");
            exit();
            
  } else {
            echo "Error al iniciar sesion: " . $conexion->error;
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