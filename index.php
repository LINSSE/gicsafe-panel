
<?php

$mysqli = new mysqli('127.0.0.1', 'root', '', 'gicsafe');

if ($mysqli->connect_errno) {
  echo "Error: " . $mysqli->connect_error . "\n";
    
    exit;
}


$sql = "SELECT *, FLOOR((TIME_TO_SEC(CURRENT_TIMESTAMP) - TIME_TO_SEC(fecha))/60) AS `minutes` from device_info" ;
if (!$resultado = $mysqli->query($sql)) {
   
    echo "Error: La ejecución de la consulta falló debido a: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
}





?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GICSAFE</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand navbar-link" href="#">GICSAFE</a>
                    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                </div>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav">
                        <!-- <li class="active" role="presentation"><a href="#">Inicio </a></li> -->
                        <li role="presentation"><a href="monitor">Mensajes en formato crudo</a></li>
                        <!-- <li role="presentation"><a href="cdp">Contador de Pasajeros</a></li> -->
                    </ul>
                </div>
            </div>
        </nav>

        <h2>
            Monitores de Barreras Instalados
        </h2>
        <table class="table">
    
        <thead>
            <tr>
                
            <th scope="col">Línea</th>
            <th scope="col">Localidad</th>
            <th scope="col">Paso a Nivel</th>
            <th scope="col">Dispositivo</th>
            <th scope="col">Prestador</th>
            <th scope="col">Última Actualización</th>
            <th scope="col">Estado de Señal</th>
            <th scope="col">Tensiones</th>
            
            <th scope="col">Estado Paso a Nivel</th>
            <th scope="col">Acción</th>
            </tr>
        </thead>
        <tbody>
            
        
        <?php

while ($res = $resultado->fetch_assoc()) 
{?>
   



        <tr>
            <td scope="col">
                 <?php echo $res['linea'];?>
               
               </td>
            <td scope="col">
                <?php echo $res['localidad'];?>
            </td>
            <td scope="col">
                <?php echo $res['pan'];?>
               
            </td>
            <td scope="col">
                <?php echo '<a href="monitor/monitor.php?monitor='.$res['device_id'].'">'.$res['device_id'].'</a>';?>
               
        </td>

         <td scope="col"> <?php echo $res['prestadora'];?></td>
            <td scope="col"> <?php echo $res['fecha'];?>
                </br><span class="text-muted">(hace <?php echo $res['minutes']?> minutos)</span></td>
            <td scope="col"> <?php echo $res['sl'];?>
                <i class="glyphicon glyphicon-signal"></i></td>
            <td scope="col">
                <div class="row">

                    <?php
                    // $q = "SELECT sensor, avg(value) from (SELECT * from analogicos where device_id = $res['device_id']
                    //             order by id desc
                    //             limit 0, 50) as a GROUP by sensor";

                    ?>
                    <div class="col col-md-12">VAC Abrigo:</div>
                    <div class="col col-md-12">VDC Abrigo:</div>
                    <div class="col col-md-12">VDC Monito:</div>
                </div>

            </td>
            
            <td scope="col">Estado Paso a Nivel</td>
            <td scope="col">
                <button class="btn btn-primary">Ver Graficos</button><br>
                 <?php echo '<a href="monitor/monitor.php?monitor='.$res['device_id'].'"><button class="btn btn-success" >Ver Estados</button></a>';?>
                
            </td>
            
    </tr>
<?php }?>
</tbody></table>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            setTimeout(function(){
                window.location.reload(true);
            },60000)
        })
    </script>
</body>

</html>