<?php
date_default_timezone_set('America/Lima');
include("../conec.php");
// Obtener los datos del cuerpo de la solicitud
$data = json_decode(file_get_contents('php://input'), true);

// Extraer el array de JSON y la variable
$jsonArray = $data['json'];
$idCliente = $data['id'];
$dias = $data['dias'];
$PrecioTotal = $data['precio'];
// crear Ficha
$idFicha = uniqid();
$fecha_actual = date('Y-m-d');
$nueva_fecha = date('Y-m-d', strtotime($fecha_actual . ' + ' . $dias . ' days'));

$sql = "INSERT INTO Ficha(PK_Ficha, Fich_FechaEntrega, Fich_FechaDevolucion, Fich_PrecioTotal, FK_Cliente_Ficha, FK_Estado_Ficha) VALUES ('$idFicha','$fecha_actual','$nueva_fecha','$PrecioTotal','$idCliente','1' )";

if ($conex->query($sql) === TRUE) {
    echo "Inserción exitosa de Ficha";
} else {
    echo "Error en la inserción de Ficha: " . $conn->error;
}
// // crear fichaDetalle 
$cantidadArray = count($jsonArray);
for ($i = 0; $i < $cantidadArray; $i++) {
    $idFichaDetalle = uniqid();
    $idDisfraz = $jsonArray[$i]['id'];
    $cantDisfraz = $jsonArray[$i]['cantidad'];
    $sql = "INSERT INTO FichaDetalle (PK_FichaDetalle, FK_Ficha_FichaDetalle, FK_DisfrazTalla_FichaDetalle, Fdet_CantidadCompra) VALUES ('$idFichaDetalle','$idFicha','$idDisfraz','$cantDisfraz')";
    if ($conex->query($sql) === TRUE) {
        echo "Inserción exitosa de Ficha";
    } else {
        echo "Error en la inserción de Ficha: " . $conn->error;
    }
    //actualizar cantidad de unidades
    $cantidadActual = intval($jsonArray[$i]['cantidadTotal']);
    $cantidadUpdate = $cantidadActual - $cantDisfraz;

    $sql = "UPDATE DisfrazTalla SET Dtal_Cantidad = '$cantidadUpdate' WHERE PK_DisfrazTalla = '$idDisfraz'";
    if ($conex->query($sql) === TRUE) {
        echo "Inserción exitosa de Ficha";
    } else {
        echo "Error en la inserción de Ficha: " . $conn->error;
    }

}


$conex->close();
?>