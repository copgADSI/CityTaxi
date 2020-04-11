<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>sistema admin</title>
</head>
<header>
  <center>
    <?php
    include '../partials/header.php';

    ?>
  </center>
  <HR>
  </HR>
</header>

<body>

  <div class="card">
    <div class="card-header">
      <center>
        <a href="" class="btn btn-warning"> <label for="nombre">Conductores</label> </a>
        <a href="" class="btn btn-success"> <label for="">Tipo vevículo</label> </a>
        <a href="" class="btn btn-primary"> <label for="">Ciudades</label> </a>

        <a href="" class="btn btn-danger"> <label for="">Todas las reservas</label> </a>

      </center>

    </div>
  </div><br><br>
  <table class="table table-bordered">
    <thead>
      <th scope="col">Foto</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Documento</th>
      <th scope="col">Género</th>

      <th scope="col">Teléfono</th>
      <th scope="col">Dirección </th>

      <th scope="col">email</th>
      <th scope="col">Marca vehículo</th>
      <th scope="col">Placa vehículo</th>
      <th scope="col">Modelo vehíclo</th>

      <th scope="col">email</th>

      <th scope="col">Acción</th>

    </thead>
    <tbody>
      <?php
      require '../Datos/Conexion2.php';

      $sql = "SELECT Nombre,Apellido,Documento,Genero,Telefono,Direccion,email,vehiculo.Modelo,vehiculo.Marca,vehiculo.Placa
      FROM conductor
      INNER JOIN Vehiculo ON (vehiculo.IdConductor=conductor.IdConductor)";
      $resultado = mysqli_query($con, $sql);
      //var_dump($sql);

      while ($filas = mysqli_fetch_assoc($resultado)) {





      ?>
        <tr>
          <td><?php echo $filas['Nombre'] ?></td>
          <td><?php echo $filas['Apellido'] ?></td>
          <td><?php echo $filas['Documento'] ?></td>
          <td><?php echo $filas['Genero'] ?></td>
          <td><?php echo $filas['Telefono'] ?></td>
          <td><?php echo $filas['Direccion'] ?></td>

          <td><?php echo $filas['email']  ?></td>
          <td>$<?php echo $filas['Marca'] ?></td>
          <td><?php echo $filas['Placa'] ?></td>
          <td><?php echo $filas['Modelo'] ?></td>
          <td>
            <a href="EditarRuta.php?idReserva=<?php echo $filas['idReserva'] ?> " class="btn btn-success">
              <i class="fas fa-marker"></i>
            </a>
            <a href="EliminarRuta.php?idReserva=<?php echo $filas['idReserva'] ?>" class="btn btn-danger">
              <i class="fas fa-trash-alt"></i>
            </a>


          </td>
        </tr>

      <?php } ?>
    </tbody>
  </table>
  <br><br><br>
  <center>
    
    <div class="card" style="width: 500px;">
      <div class="card-header">
        AGREGAR NUEVO CONDUCTOR
      </div>
      <div class="card-body">
      
        <form action="registroConductor.php" method="post" enctype="multipart/form-data">
          <input type="file" name="foto" id="foto"><br> <br>
          <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese nombre conductor">
          <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingrese apellido conductor">
          <input type="text" class="form-control" name="documento" id="documento" placeholder="Ingrese documento conductor">
          <select name="genero" id="genero" class="form-control">
            <option value="genero">seleccione un género...</option>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>

          </select>
          <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Ingrese un teléfono">
          <textarea name="direccion" id="direccion" class="form-control" cols="1" rows="2"></textarea>
          <input type="email" class="form-control" name="email" id="email" placeholder="Ingrese email conductor">

          <input type="password" class="form-control" name="password" id="password" placeholder="Ingrese contraseña conductor">
          <input type="password" class="form-control" name="confirm-password" id="confirm-password" placeholder="validar contraseña conductor"><br><br>
         
          <input type="file" name="foto" id="foto">
          <input type="text" name="modelo" id="modelo" class="form-control" placeholder="Ingrese modelo de taxi">
          <input type="text" name="placa" id="placa" class="form-control" placeholder="Ingrese placa de taxi">
          <input type="text" name="marca" id="marca"  class="form-control"placeholder="Ingrese marca de taxi">


          <input type="submit" class="btn btn-outline-success btn-block">
        </form>
      </div>
      <div class="card-footer">
        citytaxi
      </div>
    </div>
  </center>

</body>

</html>
