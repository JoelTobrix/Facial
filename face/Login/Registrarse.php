<?php
$conexion = new mysqli("localhost", "root", "", "face");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if (isset($_POST['usuario_reg']) && isset($_POST['contraseña_reg'])) {
    $usuario = $_POST['usuario_reg'];
    $contraseña = $_POST['contraseña_reg'];
     
    //Consulta SQL verificar registro
    $sql_verificar = "SELECT * FROM usuarios WHERE usuario='$usuario'";
    $resultado_verificar = $conexion->query($sql_verificar);
    if ($resultado_verificar->num_rows > 0) {
        echo "El usuario ya existe";
    } else {
        $sql_registro = "INSERT INTO usuarios(usuario,contraseña) VALUES ('$usuario', '$contraseña')";
        if ($conexion->query($sql_registro) === TRUE) {
            echo "Registro Exitoso";
        } else {
            echo "Error registro: " . $conexion->error;
        }
    }
} else {
    echo "Complete los campos";
}
$conexion->close();
?>
