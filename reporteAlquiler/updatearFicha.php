<?php
// Obtener los datos enviados desde JavaScript
include("../conec.php");
$data = json_decode(file_get_contents('php://input'), true);
$idFicha = $data['ficha'];

$sql = "SELECT * FROM FichaDetalle JOIN DisfrazTalla ON FichaDetalle.FK_DisfrazTalla_FichaDetalle = DisfrazTalla.PK_DisfrazTalla JOIN Disfraz ON DisfrazTalla.FK_Disfraz_DisfrazTalla = Disfraz.PK_Disfraz WHERE FK_Ficha_FichaDetalle = '$idFicha'";

$resultado = $conex->query($sql);

// Verificar si la consulta tuvo éxito
if (!$resultado) {
    $respuesta = "error";
    echo $respuesta;
} else {
    $cantidad = array();
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $IDdisfraces = $fila["FK_DisfrazTalla_FichaDetalle"];
        $cantDisfraces = intval($fila["Fdet_CantidadCompra"]);
        $cantAnterior = intval($fila["Dtal_Cantidad"]);
        //cantidad nueva a updatear sumar anterior mas pedido de ficha a finalizar
        $final = $cantAnterior + $cantDisfraces;

        $sql = "UPDATE DisfrazTalla SET Dtal_Cantidad = '$final' WHERE PK_DisfrazTalla = '$IDdisfraces'";
        $reso = $conex->query($sql);
        if (!$reso) {
            $respuesta = "error";
            echo $respuesta;
        }
    }
    //cambiar estado de ficha
    $sql = "UPDATE Ficha SET FK_Estado_Ficha = '2' WHERE PK_Ficha = '$idFicha'";
    $resultado = $conex->query($sql);
    if (!$resultado) {
        $respuesta = "error";
        echo $respuesta;
    }

}

$conex->close();
?>