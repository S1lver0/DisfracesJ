<?php
// Obtener los datos enviados desde JavaScript
include("../conec.php");
$data = json_decode(file_get_contents('php://input'), true);

$sql = "SELECT * FROM Ficha";

$resultado = $conex->query($sql);

// Verificar si la consulta tuvo éxito
if (!$resultado) {
    $respuesta = "error";
    echo $respuesta;
} else {
    $filas = array();
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $filas[] = $fila;
    }
    echo json_encode($filas);
}
$conex->close();
?>