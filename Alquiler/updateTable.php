<?php
include("../conec.php");
// Obtener los datos del cuerpo de la solicitud
$data = json_decode(file_get_contents('php://input'), true);

// Extraer el array de JSON y la variable
$jsonArray = $data['json'];
$variable = $data['id'];
// crear ficha 


$sql = "SELECT * FROM Disfraz WHERE Disf_Nombre = '$disfraz'";

$resultado = $conex->query($sql);



$conex->close();
?>