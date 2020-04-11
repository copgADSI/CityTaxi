
<?php
require_once '../../partials/header.php';
require '../../Datos/Conexion2.php';
 @session_start();
 $_SESSION['idConductor'];
 $sesion=$_SESSION['idConductor'];
 $sql="SELECT tarifa.TipoVehiculo,idVehiculo FROM vehiculo
 INNER JOIN tarifa ON (tarifa.idTarifa=vehiculo.idVehiculo)
 WHERE idConductor=$sesion";
 $resultado=mysqli_query($con,$sql);
 //var_dump($sql);
 while ($filas=mysqli_fetch_assoc($resultado)){

    $vehiculo=$filas['TipoVehiculo'];
    $idVehiculo=$filas['idVehiculo'];


 }


 if(isset($_GET['idReserva'])){

    $idReserva=$_GET['idReserva'];
    $consulta="UPDATE reserva SET Estado='En Proceso...', idVehiculo='$idVehiculo' WHERE idReserva=$idReserva";
    $result=mysqli_query($con,$consulta);
    echo "<script> alert('El servicio está en proceso');
      </script>";
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../partials/css/diseno.css">

    <title>Document</title>
</head>
<body>

 
 <div id="sidebar">
        <div class="toggle-btn">
            <span>&#9776</span>
        </div>
        <ul>

            <li>
                <img src="../../partials/img/girl.png" alt="Logo " style=" width:300px;
                height:300px;" class="logo">
            </li>
            <li>
            <a href="#">Mis Datos</a>  
            
            </li>
            <li>
            <a href="#">Mi Vehículo</a>
            </li>

        </ul>

     </div>
     
 </div>
<div class="tabla">
<table class="table table-bordered">
<thead>
<th  scope="col">Fecha</th>
<th  scope="col">Hora</th>
<th  scope="col"> Inicio Destino</th>
<th  scope="col">Fin Destino</th>
<th  scope="col">Via Opcional</th>

<th  scope="col">Tipo  Vehículo</th>
<th  scope="col">Tiempo </th>

<th  scope="col">Distancia</th>
<th  scope="col">VALOR $</th>
<th  scope="col">Estado</th>

</thead>
<tbody>
<?php
require '../../Datos/Conexion2.php';
    $sql="SELECT idReserva,Fecha,Hora,Origen,Destino,ViaOpcional,Valor,Distancia,Tiempo,tarifa.TipoVehiculo,Estado FROM reserva 
    INNER JOIN tarifa ON (tarifa.idTarifa=reserva.idTarifa)
    WHERE idVehiculo=$idVehiculo ORDER BY idReserva DESC LIMIT 1";
    $resultado=mysqli_query($con,$sql);
     //var_dump($sql);
    while ($filas=mysqli_fetch_assoc($resultado)){
    $estado=$filas['Estado'];
  

?>
<tr>
<td><?php echo $filas['Fecha'] ?></td>
<td><?php echo $filas['Hora'] ?></td>
<td><?php echo $filas['Origen'] ?></td>
<td><?php echo $filas['Destino'] ?></td>
<td><?php echo $filas['ViaOpcional'] ?></td>
<td><?php echo $filas['TipoVehiculo'] ?></td>
<td><?php echo $filas['Tiempo'] ?></td>

<td><?php echo $filas['Distancia']." Km" ?></td>
<td>$<?php  echo $filas['Valor'] ?></td>
<td><?php echo $filas['Estado'] ?></td>



</tr>
<tr>

<a href="FinalizarServicio.php?idReserva=<?php echo $filas['idReserva']?> "class="btn btn-success" style="width:710px;">CONCLUIR RUTA
<!--<i class="fas fa-marker"  ></i>-->
</a>  



</tr>
<?php } ?>
</tbody>
</table>
<?php 

?>
<a href="CancelarServicio.php?idReserva=<?php echo $filas['idReserva']?> "class="btn btn-danger" style="width:710px;">CANCELAR RUTA
<!--<i class="fas fa-marker"  ></i>-->
</a>  
</div>


 </body>
</html>
<script type="text/javascript">

 
    // sidebar toggle
    const btnToggle = document.querySelector('.toggle-btn');

    btnToggle.addEventListener('click', function () {
        console.log('clik')
        document.getElementById('sidebar').classList.toggle('active');
        console.log(document.getElementById('sidebar'))
    });

</script>
<style>
#sidebar {
    position: fixed;
    width: 220px;
    height: 100%;
    background: #000000;
    left: -320px;
    transition: all 500ms linear;
}

    #sidebar.active {
        left: 0px;
    }

    #sidebar ul li {
        color: rgba(230, 230, 230, .9);
        list-style: none;
        padding: 15px 10px;
        border-bottom: 1px solid rgba(100, 100, 100, .3);
        text-align: center;
    }

.logo {
    display: block;
    margin: 0 auto;
    top:44px;
}

#sidebar .toggle-btn {
    position: absolute;
    left: 330px;
    top: 20px;
    cursor: pointer;
}

    #sidebar .toggle-btn span {
        display: block;
        width: 40px;
        text-align: center;
        font-size: 30px;
        border: 3px solid #000;
    }
    .tabla{

position:absolute;
width:700px;
height:200px;
left:302px;
top:222px;


    }
</style>