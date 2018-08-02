<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIMBA</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
                        <li  role="presentation"><a href="../">Inicio </a></li>
                        <li class="active" role="presentation"><a href="#">Monitor de Barreras </a></li>
                        <li role="presentation"><a href="../cdp">Contador de Pasajeros</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- aca puedo poner para seleccionar el dispositvo para ir a ver los registros -->




<?php
if (!isset($_GET['device_id'])) 
{
?>
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover table-condensed">
        <thead>
            <tr>
                <th class="col-md-2">Fecha</th>
                <th>Dispositivo</th>
                <th>Mensaje</th>
            </tr>
        </thead>
        <tbody id="sheet">
           <!-- contenido dinamico aca -->
        </tbody>
    </table>
</div>
<?php
} else {
    
// Graficos por defecto
?>
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover table-condensed">
        <thead>
            <tr>
                <th class="col-md-2">Fecha</th>
                <th>CV</th>
                <th>BB</th>
                <th>BL</th>
                <th>Estado</th>
                <th>Observacion</th>
                <th>Duracion</th>
            </tr>
        </thead>
        <tbody id="tablaSensorDigital" device="<?php echo $_GET['device_id']?>">
           <!-- contenido dinamico aca -->
        </tbody>
    </table>
</div>



<?php }

?>
    

       
    <script src="../assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="live.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>