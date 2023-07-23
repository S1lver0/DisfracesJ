<?php
// Obtener los datos enviados desde JavaScript
include("../conec.php");
$data = json_decode(file_get_contents('php://input'), true);
$disfraz = $data['disfraz'];

$sql = "SELECT * FROM Disfraz WHERE Disf_Nombre = '$disfraz'";

$resultado = $conex->query($sql);

// Verificar si la consulta tuvo éxito
if (!$resultado) {
    $respuesta = "error";
    echo $respuesta;
} else {
    $row = $resultado->fetch_assoc();
    $Id_Disfraz = $row['PK_Disfraz'];
    $sql = "SELECT * FROM DisfrazTalla WHERE FK_Disfraz_DisfrazTalla = '$Id_Disfraz'";
    $resultado = $conex->query($sql);
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
}

$conex->close();
?>