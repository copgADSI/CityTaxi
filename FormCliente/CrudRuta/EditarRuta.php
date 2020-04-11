<?php
require_once '../../Datos/Conexion2.php';

//determina si por método GET existe  mi idReserva 
if(isset($_GET['idReserva'])){
//capturo el método GET en una variable llamada $idReserva
$idReserva=$_GET['idReserva'];
//consulta hacia la bd que contiene mi variable $idReserva
$consulta="SELECT idReserva,Tarifa.TipoVehiculo,Fecha,Hora,Distancia FROM Reserva INNER JOIN tarifa ON (tarifa.idTarifa=Reserva.idTarifa)  WHERE idReserva=$idReserva";
//ejecuta mi consulta que 
// contiene dos parámetros (conexión y consulta)

$result=mysqli_query($con,$consulta);

//me determina si hay nuna fila existente  con ese idReserva(cuenta la cantidad de filas >0)
if(mysqli_num_rows($result)==1){
$fila=mysqli_fetch_array($result);
//tomamos los datos y los almacenamos en variables
$tipoVehiculo=$fila['TipoVehiculo'];
$fecha=$fila['Fecha'];
$hora=$fila['Hora'];
$distancia=$fila['Distancia'];

 
}



}

//comprobar si existe el btn actualizar 
if(isset($_POST['actualizar'])){

    if(isset($_POST['tarifa'])){
    // recibo los parámetros por method POST y los guardo en una varible
    $idReserva=$_GET['idReserva'];
    $idTarifa=$_POST['TipoVehiculo'];
    $tarifa=$_POST['tarifa'];

    $distancia=$_POST['distancia'];
    $fecha=$_POST['fecha'];
    $hora=$_POST['hora'];

    $valor =  $tarifa*$distancia;

    //generamos la consulta hacia la bd con las variables que contendrán los nuevos datos de la reserva
    $consulta2="UPDATE reserva SET Fecha='$fecha',Hora='$hora',Valor='$valor',idTarifa='$idTarifa' WHERE idReserva=$idReserva";
    //ejecutar consultas

    mysqli_query($con,$consulta2);
    }
}
if(isset($_POST['actualizar'])){

    if(!isset($_POST['tarifa'])){
    // recibo los parámetros por method POST y los guardo en una varible
    $idReserva=$_GET['idReserva'];

    $fecha=$_POST['fecha'];
    $hora=$_POST['hora'];


    //generamos la consulta hacia la bd con las variables que contendrán los nuevos datos de la reserva
    $consulta2="UPDATE reserva SET Fecha='$fecha',Hora='$hora' WHERE idReserva=$idReserva";
    //ejecutar consultas

    mysqli_query($con,$consulta2);
    }
}

?>
<?php  require '../../partials/header.php';  ?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../../partials/css/diseno.css">
</head>
<body>

<center>
<div class="contenido">

<br><br><br>

<form action="EditarRuta.php?idReserva=<?php echo $_GET['idReserva'];?>" method="POST">


<input type="text" name="fecha" placeholder="INGRESA NUEVA FECHA "value="  <?php echo $fecha; ?> "  class="form-control" style="width:330px;height:50px" id="datepicker">
<br>
<input type="text" name="hora" value="  <?php echo $hora; ?> " class="form-control" style="width:330px;height:30px">
<br>
<?php 
                        require ("../../Datos/Conexion.php");
                        $response=$conn->prepare("SELECT * FROM tarifa");
                        $response->execute();
                        ?>
                        
                      <select  name="TipoVehiculo" id="TipoVehiculo"  onchange="dato(this);" style="width:100%;height:50px" class="form-control">
                       

                           <?php  echo  "<option class='text-primary'   value=".$r[0]."  >".$tipoVehiculo."</option>";  ?>
                                
                           <?php  echo  "<option class='text-primary' disabled value=".$r[0]." >'SELECCIONA NUEVA TARIFA'</option>";  ?>

                            <?php 
                            
                            foreach ($response as $r) {
                               
                                echo "<option  disabled class='text-success'  >".$r['TipoVehiculo'].":"."</option>";
                                echo  "
                                <option class='text-danger' value=".$r[0]."  >".$r['TasaBasica']."</option>";
                            }?>
                            </select>
                            <br><br>
    <input type="hidden" onlyRead name="distancia" value=" <?php echo $distancia; ?> ">
    <input type="hidden"  name="tarifa"  id="tarifa">
         
                            <input type="submit" name="actualizar" value="Actualizar ">

</form>


</div>
</center>
</body>
</html>
<script type="text/javascript">
//función que toma el texto seleccionado del SELECT y lo pasa a un input 
function dato(inputSelect){
    document.getElementById("tarifa").value = inputSelect.options[inputSelect.selectedIndex].text;;

}

</script>
<style>
.contenido{
    position:relative;
    width:400px;
    height:500px;
}

</style>
<script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap2'
        });
    </script>


