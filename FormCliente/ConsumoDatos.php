<?php
 @session_start();
 $_SESSION['idCliente'];
 require '../Datos/Conexion2.php';

?>

<?php
 //  $_SESSION['idCliente'];
   $sesion= $_SESSION['idCliente'];
   $estado="En Espera...";

   $origen= $_POST['origen'];
   $destino= $_POST['destino'];
   $distancia=$_POST['distancia'];
   $tiempo=$_POST['tiempo'];
   $via=$_POST['routeVia'];
   $fecha=$_POST['datetime'];
   $tipoVehiculo=$_POST['TipoVehiculo'];

   //variable de valor del vehículo
   $tarifa=$_POST['tarifa'];
   $valor= $distancia*$tarifa;

   
   $query="SELECT COUNT(idCliente) FROM reserva WHERE idCliente=$sesion";
   $ejecutarQuery=mysqli_query($con,$query);

    
   while($dato=mysqli_fetch_assoc($ejecutarQuery)){

      $cantidad=$dato['COUNT(idCliente)'];

      if($cantidad>3){


         header('Location: mensaje.php');
       
      }
      else{


         $consulta="INSERT INTO Reserva (Fecha,Origen,Destino,ViaOpcional,Distancia,Tiempo,Valor,Estado,idTarifa,idCliente)
         VALUES ('$fecha','$origen','$destino','$via','$distancia','$tiempo','$valor','$estado','$tipoVehiculo','$sesion')";
           
         $result= mysqli_query($con,$consulta) or die("Error al realizar la reserva");
         echo '¡Servicio de Taxi Realizado!';
         header('Location: CrudRuta/DetallesRuta.php');
         mysqli_close($con);
        
   
       
      }

   }
   
  

        


   



?>
