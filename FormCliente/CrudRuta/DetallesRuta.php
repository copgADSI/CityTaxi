<?php 
@session_start();
$sesion=$_SESSION['idCliente'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
 <link rel="stylesheet" href="../../partials/css/diseno.css">
    <title>Detalles Reserva - CityCab</title>
</head>
<body>
<?php
require_once "../../partials/header.php";
?>

<br><br>
    <table class="table table-bordered">
<thead>
<th  scope="col">Fecha</th>
<th  scope="col"> Inicio Destino</th>
<th  scope="col">Fin Destino</th>
<th  scope="col">Via Opcional</th>

<th  scope="col">Tipo  Vehículo</th>
<th  scope="col">Tiempo </th>

<th  scope="col">Distancia</th>
<th  scope="col">VALOR $</th>
<th  scope="col">Usuario</th>
<th  scope="col">Estado</th>
<th  scope="col">Acción</th>

</thead>
<tbody>
<?php
 require '../../Datos/Conexion2.php';

 $sql="SELECT idReserva,Fecha,Origen,Destino,ViaOpcional,tarifa.TipoVehiculo,Tiempo,Distancia,Valor,Cliente.Nombre,Estado FROM reserva
 INNER JOIN cliente ON (Cliente.idCLiente=reserva.idCliente) INNER JOIN tarifa ON (tarifa.idTarifa=reserva.idTarifa) 
 WHERE cliente.idCliente=$sesion ORDER BY idReserva DESC LIMIT 1";
 $resultado=mysqli_query($con,$sql);
 //var_dump($sql);
    
    while ($filas=mysqli_fetch_assoc($resultado)){




     
     ?>
      <tr>
      <td><?php echo $filas['Fecha'] ?></td>
      <td><?php echo $filas['Origen'] ?></td>
      <td><?php echo $filas['Destino'] ?></td>
      <td><?php echo $filas['ViaOpcional'] ?></td>
      <td><?php echo $filas['TipoVehiculo'] ?></td>
      <td><?php echo $filas['Tiempo'] ?></td>

      <td><?php echo $filas['Distancia']." Km" ?></td>
      <td>$<?php  echo $filas['Valor'] ?></td>
      <td><?php echo $filas['Nombre'] ?></td>
      <td><?php echo $filas['Estado'] ?></td>


      <td>
      <a href="EditarRuta.php?idReserva=<?php echo $filas['idReserva']?> "class="btn btn-success">
      <i class="fas fa-marker"></i>
      </a>  
      <a  href="EliminarRuta.php?idReserva=<?php echo $filas['idReserva']?>"class="btn btn-danger">
      <i  class="fas fa-trash-alt" ></i>
      </a>


      </td>
      </tr>

<?php } ?>
</tbody>
</table>
</body>
<CENTER>
<a class="btn btn-warning" href="../Ruta.php"class="btn btn-danger" >VOLVER A RESERVAR
<i class="fas fa-taxi"></i></a>
<br><br><br>
<a  class="btn btn-primary"  href="home.php"class="btn btn-secondary">¿CÓMO SER CONDUCTOR?
<i class="fas fa-handshake"></i>></a>
</CENTER>
</html>