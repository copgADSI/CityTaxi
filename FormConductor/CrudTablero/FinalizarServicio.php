
<?php 

 @session_start();
 require '../../Datos/Conexion2.php';
 $sesion=$_SESSION['idConductor'];

     
    if(isset($_GET['idReserva'])){

        $idReserva=$_GET['idReserva'];

        $consultaUpdate="UPDATE reserva SET Estado='FINALIZADO' WHERE idReserva=$idReserva";
        $resultUpdate=mysqli_query($con,$consultaUpdate);

        header('Location:TableroServicio.php');



     
    }

?>
