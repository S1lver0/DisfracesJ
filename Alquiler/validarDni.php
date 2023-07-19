<?php
// Obtener los datos enviados desde JavaScript
include("../conec.php");
$data = json_decode(file_get_contents('php://input'), true);
$dni = $data['dni'];

$sql = "SELECT COUNT(*) AS total FROM Cliente WHERE PK_Cliente = '$dni'";

$resultado = $conex->query($sql);

// Verificar si la consulta tuvo éxito
if (!$resultado) {
    $respuesta = "error";
} else {
    $row = $resultado->fetch_assoc();
    $total = $row['total'];
    // Verificar si el dni existe en la tabla
    if ($total == 1) {
        $respuesta = true;
    } else {
        $respuesta = false;
    }
}

echo json_encode($respuesta);
$conex->close();
?>