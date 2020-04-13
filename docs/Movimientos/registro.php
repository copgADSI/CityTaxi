<?php
require '../Datos/Conexion.php';
if(!empty($_POST['txtUsuario']) && !empty($_POST['txtContrasenia']) && !empty($_POST['txtDocumento']) && !empty($_POST['txtNombre']) && !empty($_POST['txtApellido']) && !empty($_POST['txtFechaNacimiento']) && !empty($_POST['cmbGenero']) &&!empty($_POST['txtTelefono'])){

    $sql="INSERT INTO Cliente(Documento,Nombre,Apellido,FechaNacimiento,Genero,Telefono,email,Clave) VALUES (:Documento,:Nombre,:Apellido,:FechaNacimiento,:Genero,:Telefono,:email,:Clave)";
    $stmt=$conn->prepare($sql);
    $stmt->bindParam(':Documento',$_POST['txtDocumento']);
    $stmt->bindParam(':Nombre',$_POST['txtNombre']);
    $stmt->bindParam(':Apellido',$_POST['txtApellido']);
    $stmt->bindParam(':FechaNacimiento',$_POST['txtFechaNacimiento']);
    $stmt->bindParam(':Genero',$_POST['cmbGenero']);
    $stmt->bindParam(':Telefono',$_POST['txtTelefono']);
    $stmt->bindParam(':email',$_POST['txtUsuario']);
    $password=password_hash($_POST['txtContrasenia'],PASSWORD_BCRYPT);
    $stmt->bindParam(':Clave',$password);

    if($stmt->execute()){
$mensage='<center> <a href="../Login.php>Iniciar Sesión </a></center> ';
    }
    else{
        $mensage='Error al registrar nuevo usuario';
    }


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Sistema CityCabt</title>
<link rel="stylesheet" href="../partials/css/diseno.css">
</head>
<body>
<?php

include '../partials/header.php';
?>

<?php if(!empty($mensage)): ?>
    <p> <?= $mensage ?></p>
<?php endif; ?>
<span>  </span>
<center>
<h3>Bienvenido al Sistema de Sesiones CityCab</h3>

</center>
    <form action="registro.php" method="POST">
        <br>
    <input type="text" name="txtUsuario" Placeholder="Ingrese su Correo">
    <input type="password" name="txtContrasenia" Placeholder="Ingrese su Contraseña"><br>
    
    <input type="text" name="txtDocumento"  Placeholder="Ingrese su Documento"><br>
    <input type="text" name="txtNombre" Placeholder="Ingrese su Nombre"><br>
    <input type="text" name="txtApellido" Placeholder="Ingrese su Apellido"><br>
    <select name="cmbGenero"  style="width:200px;  outline: none;
    padding: 20px;
    display: block;
    width: 300px;
    border-radius: 3px;
    border: 1px solid #eee;
    margin: 20px auto;" class="form-control" id="">
        <option value="0">Seleccione Género</option>
        <option value="1">Masculino</option>
        <option value="2">Femenino</option>

    </select>
    <input type="date" name="txtFechaNacimiento"  class="form-control" style="width:200px;   outline: none;
    padding: 20px;
    display: block;
    width: 300px;
    border-radius: 3px;
    border: 1px solid #eee;
    margin: 20px auto;" Placeholder="Ingrese su Fecha Nacimiento"><br>
    <input type="text" name="txtTelefono" Placeholder="Ingrese su Teléfono"><br>
<center>
<input type="submit" name="registrar" value="Registrar Cliente">

</center>

    </form>
</body>
 
</html>