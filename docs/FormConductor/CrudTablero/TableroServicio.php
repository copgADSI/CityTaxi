<?php 
require '../../Datos/Conexion2.php';
@session_start();
$_SESSION['idConductor'];
$sesion=$_SESSION['idConductor'];
$consultaIf="SELECT * FROM reserva WHERE idVehiculo=$sesion";
$result4=mysqli_query($con,$consultaIf);
// mysqli_fetch_assoc sirve para asociar una variable con una consulta
while($if=mysqli_fetch_assoc($result4)){
    //igualo mu variable con con lo venga de la columna Estado de mi bd
    $cantidad=$if['Estado'];
    //determino si mi estado es ='En proceso'
    if($cantidad==='En Proceso...'){

        // si cumple con la condición me redireccionará 
        // esto es para evitar aceptar varias rutas indefinidamente 
        header('Location: AceptarServicio.php');
    }
  
}



?>
<?php

 $sql="SELECT tarifa.TipoVehiculo,idVehiculo FROM vehiculo
 INNER JOIN tarifa ON (tarifa.idTarifa=vehiculo.idVehiculo)
 WHERE idConductor=$sesion";
 $resultado=mysqli_query($con,$sql);
 //var_dump($sql);
 while ($filas=mysqli_fetch_assoc($resultado)){

    $vehiculo=$filas['TipoVehiculo'];
    $idVehiculo=$filas['idVehiculo'];

?>
<input type="hidden" value="<?php echo $vehiculo; ?>"  id="idVehiculo">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
 <link rel="stylesheet" href="../../partials/css/diseno.css">
    <title>Tablero Reserva - CityCab</title>
</head>
<body>
<?php
require_once "../../partials/header.php";
?>

<a href="../logout.php" name="cerrarSesion"class="btn btn-danger" Title="Cerrar Sesión" style="width:140px; position:relative; left:1233px;top:10px;">
Cerrar Sesión <i class="fas fa-sign-out-alt"></i></a>
<a href="../DatosConductor/DatosConductor.php" name="cerrarSesion"class="btn btn-dark" Title="Cerrar Sesión" style="width:140px; position:relative; left:947px;top:10px;">
Mis Datos <i class="fas fa-book-reader"></i></a>
<br><br>
    <table class="table table-bordered">
<thead>
<th  scope="col">Fecha</th>
<th  scope="col">Hora</th>
<th  scope="col"> Origen</th>
<th  scope="col"> Destino</th>
<th  scope="col">Via Opcional</th>
<th  scope="col">Tiempo </th>
<th  scope="col">Distancia</th>
<th  scope="col">VALOR $</th>
<th  scope="col">Tipo Vehículo</th>
<th  scope="col">Estado</th>

<th  scope="col">Acción</th>

</thead>
<tbody>
<?php } 
 $consulta="SELECT idReserva,Fecha,Hora,Origen,Destino,ViaOpcional,Valor,Distancia,Tiempo,tarifa.TipoVehiculo,Estado FROM reserva 
 INNER JOIN tarifa ON (tarifa.idTarifa=reserva.idTarifa)
 WHERE TipoVehiculo= '$vehiculo' AND Estado='En Espera...'" ;
 $resultadoF= mysqli_query($con,$consulta);
 while ($filas=mysqli_fetch_assoc($resultadoF)){
?>
 <!--se puede crear una-->
 
<tr>

<td><?php echo $filas['Fecha'] ?></td>
<td><?php echo $filas['Hora'] ?></td>
<td><?php echo $filas['Origen'] ?></td>
<td><?php echo $filas['Destino'] ?></td>
<td><?php echo $filas['ViaOpcional'] ?></td>
<td><?php echo $filas['Tiempo'] ?></td>

<td><?php echo $filas['Distancia'] ?> KM</td>
<td> $ <?php echo $filas['Valor'] ?></td>
<td>  <?php echo $filas['TipoVehiculo'] ?></td>
<td>  <?php echo $filas['Estado'] ?></td>

<td>
<form action="AceptarServicio.php" method="POST">

<a href="AceptarServicio.php?idReserva=<?php echo $filas['idReserva']?> " name="aceptar"class="btn btn-success" Title="Aceptar Servicio">
<i class="fas fa-check"></i></a>
<br><br>
<a  href="RechazarServicio.php?idReserva=<?php echo $filas['idReserva']?>"class="btn btn-danger" title="Rechazar Servicio">
<i class="fas fa-times"></i></a>

</form>
</td>
</tr>
<?php }?>
</tbody>
</table>

