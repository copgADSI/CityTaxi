
<?php

@session_start();

if (isset($_SESSION['idCliente'])) {
 
  header('Location: Login.php');

}
require '../Datos/Conexion.php';

if (!empty($_POST['txtUsuario']) && !empty($_POST['txtContrasenia'])) {
  $records = $conn->prepare('SELECT idCliente, email, Clave FROM Cliente WHERE email = :email');
  $records->bindParam(':email', $_POST['txtUsuario']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  if (count($results) > 0 && password_verify($_POST['txtContrasenia'], $results['Clave'])) {
    $_SESSION['idCliente'] = $results['idCliente'];
    header("Location: ruta.php");
  } else {
    $message = 'Sorry, those credentials do not match';
    echo 'Error, Usuario y/o Contraseña </br>';

    echo '<a href="Login.php">Volver a intentarlo</a>';
  }
} 

?>
