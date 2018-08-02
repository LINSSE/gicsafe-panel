<?php 

$device_id = $_GET['device_id'];
$type = $_GET['type'];


header('Content-Type: application/json');
// DIMBA

$mysqli = new mysqli('127.0.0.1', 'root', '', 'gicsafe');


///CONEXION A BASE DE DATOS
if ($mysqli->connect_errno) {
  echo "Error: " . $mysqli->connect_error . "\n";
    
    exit;
}

//CONSULTA

switch ($type) {
	case 'digital'://historico de los cambios de los sensores digitales de la barrera
		$sql = "
		SELECT id, d1,d2,d3, (d1 * 4 + d2 * 2 + d3 * 1) as binario, fecha, duracion
		FROM `registrodigital` 
		where device_id = $device_id
		ORDER BY `id`  DESC
		limit 0,1000
		" ;		
	break;
	
	default:
		# code...
		break;
}

if (!$resultado = $mysqli->query($sql)) {
   
    echo "Error: La ejecución de la consulta falló debido a: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
}


$data = [];
while ($res = $resultado->fetch_assoc()) 
{
	$data[] = $res;
}
echo json_encode($data);











 ?>