<?php 
 require '../../Datos/Conexion2.php';
 @session_start();
 $_SESSION['idConductor'];

 //consulta para devolver el ESTADO en espera...
     
    if(isset($_GET['idReserva'])){

     $idReserva=$_GET['idReserva'];
     $consultaUpdate="UPDATE reserva SET Estado='En Espera...' WHERE idReserva=$idReserva";
     $result=mysqli_query($con,$consultaUpdate);
     header('Location: TableroServicio.php');
     
    }
?>