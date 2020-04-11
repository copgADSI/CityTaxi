<?php
require_once '../../partials/header.php';
require '../../Datos/Conexion2.php';
@session_start();
$sesion=$_SESSION['idConductor'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../partials/css/diseno.css">
    <title>Datos Conductor-CityCab</title>
</head>
<body>
<form action="ValidarDatos.php" method="POST" enctype="multipart/form-data">

<div class="datos">
<input type="file" name="foto">
<br>
<input type="date" name="fechaNacimiento" value="" placeholder="Ingrese su fecha"  title="Ingrese una nueva Fecha">
<input type="text" name="documento" value="" placeholder="Ingrese su documento " title="Ingrese un nuevo Documento">
<input type="text" name="nombre" value="" placeholder="Ingrese su nombre "  title="Ingrese su nombre">
<input type="text" name="apellido" value="" placeholder="Ingrese su apellido"  title="Ingrese un nuevo Apellido">
<input type="radio" name="genero">Masculino
<input type="radio" name="genero">Femenino
<input type="hidden" name="genero">
</div>

<div class="datos2">
<input type="text" name="telefono" value="" placeholder="Ingrese su teléfono  "  title="Ingrese un nuevo Teléfono">
<input type="text" name="direccion" value="" placeholder="Ingrese su dirección  "  title="Ingrese una nueva Dirección">
<input type="text" name="email" value="" placeholder="Ingrese su email  "  title="Ingrese un nuevo Email">
<input type="password" name="password" value="" placeholder="Ingrese su contraseña" title="Ingrese una nueva Contraseña">
<input type="password" name="confirmar" value="" placeholder="Valide su contraseña" title="Confirmar su Contraseña">

</div>

</form>
</body>
</html>
<style>
.datos{

position:relative;
width:400px;
height:60%;
left:2px;
background:#000;

}
</style>