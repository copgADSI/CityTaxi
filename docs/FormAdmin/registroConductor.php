<?php
@session_start();
require '../Datos/Conexion2.php';     
 $fotoConductor = $_FILES['foto']["name"];
 $ruta = $_FILES["foto"]["tmp_name"];
  $destino = "../FotoConductor/".$fotoConductor;
 copy($ruta, $destino);
$usuario = $_SESSION['IdAdmin'];
$nombre = $_POST['nombre'];
$apellido = $_POST["apellido"];
$documento = $_POST['documento'];
$genero = $_POST['genero'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$email = $_POST['email'];
$pass = $_POST['password'];
$confirm=$_POST['confirm-password'];

$placa=$_POST['placa'];
$marca=$_POST['marca'];
$modelo=$_POST['modelo'];


echo    $consulta = "INSERT INTO  `conductor` (`Nombre`, `Apellido`, `Documento`, `Genero`, `Telefono`, `Direccion`, `email`, `Contraseña`, `foto`,`FechaIngreso`) 
      VALUES ('$nombre ', '$apellido', '$documento', '$genero', '$telefono', '$direccion', '$email', '$pass', '$destino',NOW())";
    $result = mysqli_query($con,$consulta);
    if ($result > 0) {
        $insert="INSERT INTO vehiculo (Modelo,Marca,Placa,IdTarifa)
        ()";

        header('Location: home.php');
    } else {
        echo 'No se pudo insertar datos de conductor';
    }
