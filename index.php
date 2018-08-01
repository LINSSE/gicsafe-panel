
<?php

$mysqli = new mysqli('127.0.0.1', 'root', '', 'gicsafe');

if ($mysqli->connect_errno) {
  echo "Error: " . $mysqli->connect_error . "\n";
    
    exit;
}


$sql = "SELECT *, FLOOR((TIME_TO_SEC(CURRENT_TIMESTAMP) - TIME_TO_SEC(fecha))/60) AS `minutes` from dispositivos" ;
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
                <div class="navbar-header"><a class="navbar-brand navbar-link" href="#">Monitor de Barreras</a>
                    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                </div>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav">
                        <li class="active" role="presentation"><a href="#">Inicio </a></li>
                        <li role="presentation"><a href="monitor">Registros Dimba </a></li>
                        <li role="presentation"><a href="cdp">Registros Contador </a></li>
                    </ul>
                </div>
            </div>
        </nav>

    
        <div class="row">
            <div class="col-md-3">
                <h3>Dispositivo </h3></div>
            <div class="col-md-3">
                <h3>Nombre </h3></div>
            <div class="col-md-3">
                <h3>Ultima Actualización</h3></div>
            <div class="col-md-3">
                <h3>Estado Señal</h3></div>
        </div>
        <?php

while ($res = $resultado->fetch_assoc()) 
{?>
   



        <div class="row">
            <div class="col-md-3">
               <?php echo $res['device_id'];?>
               </div>
            <div class="col-md-3">
                Espora
            </div>
            <div class="col-md-3">
                <?php echo $res['fecha'];?>
                <span class="text-muted">(hace <?php echo $res['minutes']?> minutos)</span>
            </div>
            <div class="col-md-3">
                <?php echo $res['sl'];?>
        </div>
    </div>
<?php }?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>