<?php
$conexion = new mysqli("localhost", "root", "", "face");
if(isset($_POST['usuario'])&& isset($_POST['contraseña'])){
    $usuario=$_POST['usuario'];
    $contraseña=$_POST['contraseña'];
    
     //Consulta SQL desde la base de Datos
     $sql="SELECT* FROM usuarios WHERE usuario= '$usuario' AND contraseña='$contraseña'";
     $resultado=$conexion -> query($sql);
      //Verificar registro
        if($resultado-> num_rows>0){
            echo "Bienvenido, $usuario";
        }else{
            echo "Error";
        }
}else{
     echo "Por favor llene los campos";
}
$conexion-> close();
?>