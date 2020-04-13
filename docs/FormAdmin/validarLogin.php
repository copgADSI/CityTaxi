<?php

@session_start();

if (isset($_SESSION['IdAdmin'])) {
 
  header('Location: Login.php');

}
require '../Datos/Conexion.php';

if (!empty($_POST['txtUsuario']) && !empty($_POST['txtContrasenia'])) {
  $records = $conn->prepare('SELECT IdAdmin, email, password FROM Administrador WHERE email = :email');
  $records->bindParam(':email', $_POST['txtUsuario']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  if (count($results) > 0 && password_verify($_POST['txtContrasenia'], $results['password'])) {
    $_SESSION['IdAdmin'] = $results['IdAdmin'];
    header("Location: home.php");
  } else {
    $message = 'Sorry, those credentials do not match';
    echo 'Error, Usuario y/o Contraseña </br>';

    echo '<a href="Login.php">Volver a intentarlo</a>';
  }
} 

?>
