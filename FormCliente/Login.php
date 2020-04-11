<?php
@session_start();

  require '../Datos/Conexion.php';
  
  if (isset($_SESSION['idCliente'])) {
    $records = $conn->prepare('SELECT idCliente, email, Clave FROM Cliente WHERE idCliente = :idCliente');
    $records->bindParam(':idCliente', $_SESSION['idCliente']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    
    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Sistema CityCabt</title>
<link rel="stylesheet" href="../partials/css/diseno.css">
</head>
<body>
<?php

include '../partials/header.php';
?>

<center>


  <h3>Inicia sesión para continuar</h3>

  <form action="validarLogin.php" method="POST">
        <br>
    <input type="text" name="txtUsuario" Placeholder="Ingrese su Usuario">
    <input type="password" name="txtContrasenia" Placeholder="Ingrese su Contraseña"><br>
    <input type="submit" name="Ingresar" value="Ingresar">
<br><br>
    ¿No tienes una cuenta?<a href="../Movimientos/Registro.php">Click Aquí</a><br>
    ¿Haz olvidado tu Contraseña?<a href="Registro.php">Click Aquí</a><br><br>

    </form>
  </center>
</body>
 
</html>