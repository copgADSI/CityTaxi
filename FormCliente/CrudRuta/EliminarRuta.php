<?php 
 include '../../Datos/Conexion2.php';

 if(isset($_GET['idReserva'])){
//capturo el idReserva en una varieble para realizar la consulta DELETE
$idReserva=$_GET['idReserva'];

//mi consulta hacia la bd tomando variable idReserva
$consulta="DELETE FROM Reserva WHERE idReserva=$idReserva";

//para poder ejecutar la consulta DELETE  la mandamos en una variable
// y la mandamos como parámetros la conexión y la cosulta
$result= mysqli_query($con,$consulta);

//SI LA CONSULTA ES VACÍA  
if(!$result){
    die("ERROR AL REALIZAR CONSULTA A BD");
}
$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
¡Servicio de taxi eliminado !
</div>';
$_SESSION['message_type'] = 'danger';
header('Location: DetallesRuta.php');

 }

?>