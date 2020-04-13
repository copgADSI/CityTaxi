
<?php

@session_start();

if (isset($_SESSION['idConductor'])) {
 
  header('Location: Login.php');

}
require '../Datos/Conexion.php';

if (!empty($_POST['txtUsuario']) && !empty($_POST['txtContrasenia'])) {
  $records = $conn->prepare('SELECT idConductor, email, Contraseña FROM Conductor WHERE email = :email');
  $records->bindParam(':email', $_POST['txtUsuario']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  if (count($results) > 0 && password_verify($_POST['txtContrasenia'], $results['Contraseña'])) {
    $_SESSION['idConductor'] = $results['idConductor'];
    header("Location: CrudTablero/TableroServicio.php");
  } else {
    $message = 'Sorry, those credentials do not match';
    echo 'Error, Usuario y/o Contraseña </br>';

    echo '<a href="Login.php">Volver a intentarlo</a>';
  }
} 

?>
