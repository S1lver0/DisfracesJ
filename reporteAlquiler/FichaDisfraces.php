<?php
// Obtener los datos enviados desde JavaScript
include("../conec.php");
$data = json_decode(file_get_contents('php://input'), true);
$idCliente = $data['cliente'];
$idFicha = $data['ficha'];

$sql = "SELECT * FROM FichaDetalle JOIN DisfrazTalla ON FichaDetalle.FK_DisfrazTalla_FichaDetalle = DisfrazTalla.PK_DisfrazTalla JOIN Disfraz ON DisfrazTalla.FK_Disfraz_DisfrazTalla = Disfraz.PK_Disfraz WHERE FK_Ficha_FichaDetalle = '$idFicha'";

$resultado = $conex->query($sql);

// Verificar si la consulta tuvo éxito
if (!$resultado) {
    $respuesta = "error";
    echo $respuesta;
} else {
    $disfraces= array();
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $disfraces[] = $fila;
    }

    $sql = "SELECT * FROM Cliente WHERE PK_Cliente = '$idCliente'";
    $resultado = $conex->query($sql);
    $cliente = $resultado->fetch_assoc();
    $json = array(
        "disfraces" => $disfraces,
        "cliente" => $cliente
    );

    echo json_encode($json);

}

$conex->close();
?>