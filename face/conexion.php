<?php
$server="localhost";
$user="root";
$password="";
$database="face";

  //Establecer conexion a la base de datos login:>
  $conexion = new mysqli($server,$user,$password,$database);
    if($conexion-> connect_errno){
        die("error de conexion".$conexion-> connect_errno);
    }else{
          echo "Base de datos Conectado";
    }
    $conexion-> close();
     ?>
    