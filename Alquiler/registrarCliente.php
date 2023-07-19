<?php
// Obtener los datos enviados desde JavaScript
include("../conec.php");
$data = json_decode(file_get_contents('php://input'), true);
$dni = $data['dni'];
$nombre = $data['nombre'];
$apellido = $data['apellido'];
$celular = $data['celular'];
$direccion = $data['direccion'];

$sql = "INSERT INTO Cliente (PK_Cliente, Clie_Nombre, Clie_Apellido, Clie_Domicilio, Clie_Celular) VALUES ('$dni', '$nombre', '$apellido','$direccion','$celular')";

if ($conex->query($sql) === TRUE) {
    echo "true";
} else {
    echo "Error al insertar datos: " . $conex->error;
}



$conex->close();
?>