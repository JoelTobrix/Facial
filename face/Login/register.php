<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <center> <img src="https://img.freepik.com/vector-premium/pagina-formulario-inicio-sesion-usuario-3d_169241-6920.jpg" width="180" height="200"> </center>
    <style>
        body{
            font-family:Arial, Helvetica, sans-serif;
            background-color: #ffffff;
        }
        .login-container, .login-container2 {
            width: 300px; 
            margin: 30px auto;
            padding: 20tpx;
            background-color:#ffffff; border-radius:5px;
            box-shadow:0px 0px 10px rgba(0,0,0,0.1);
        }
        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width:100%;
            padding: 10px;
            margin-bottom:10px;
            border:1px solid #ccc;
            border-radius:3px;
            box-sizing: border-box;
        }
        input[type="submit"]{
            background-color:#0857ff;
        }
         input[type="submit"]:hover {
            background: color #f2f6fa;;
         }   
    </style>
</head>
<body>

<form action="Registrarse.php" method="post">
    <div class="login-container">
        <h2 align="center">Registrarse</h2>
        <input type="text" name="usuario_reg" placeholder="Usuario" required>
        <input type="password" name="contraseña_reg" placeholder="Contraseña" required>
        <input type="submit" value="Registrar">
        </form>
    </div>
    
    <form action="Camara.php" method="post">
     <div class="login-container2">
        <input type="submit" value="Reconocimieto facial">
</form>



</body>
</html>


