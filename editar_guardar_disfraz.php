<?php
// Verificar si se recibió el ID del disfraz a editar
if (isset($_GET['id'])) {
    $disfrazId = $_GET['id'];

    // Obtener los datos enviados desde el formulario
    $precioDisfraz = $_POST['Precio_Disfraz'];
    $tallaS = $_POST['CS'];
    $tallaM = $_POST['CM'];
    $tallaL = $_POST['CL'];

    include_once('conec.php');

    //AGREGANDO//////////////////////////////
    //obtengo la fecha de inico anterior
    $FINAL = "NULL";

    $sqlFechaFinalAnterior = "SELECT MAX(Dpre_FechaInicio) AS FECHA_FINAL_ANTERIOR FROM DisfrazPrecios WHERE FK_Disfraz_DisfrazPrecios = '$disfrazId' AND Dpre_FechaFinal = '$FINAL'";
    $resultFechaFinalAnterior = $conex->query($sqlFechaFinalAnterior);
    $rowFechaFinalAnterior = $resultFechaFinalAnterior->fetch_assoc();
    $fechaFinalAnterior = $rowFechaFinalAnterior['FECHA_FINAL_ANTERIOR'];

    //obtengo el precio de la fecha de inicio anterior

    $sqlPrecioMaximo = "SELECT Dpre_Precio FROM DisfrazPrecios WHERE FK_Disfraz_DisfrazPrecios = '$disfrazId' AND Dpre_FechaInicio = '$fechaFinalAnterior'  AND Dpre_FechaFinal = '$FINAL'";
    $resultPrecioMaximo = $conex->query($sqlPrecioMaximo);
    $rowPrecioMaximo = $resultPrecioMaximo->fetch_assoc();
    $precioMaximo = $rowPrecioMaximo['Dpre_Precio'];

    //obtengo el el pk  que pertenece la fecha y el precio

    $sqlPK_DisfrazPrecios = "SELECT PK_DisfrazPrecios FROM DisfrazPrecios WHERE FK_Disfraz_DisfrazPrecios = '$disfrazId' AND Dpre_FechaInicio = '$fechaFinalAnterior'  AND Dpre_Precio ='$precioMaximo' AND Dpre_FechaFinal = '$FINAL'";
    $resultPK = $conex->query($sqlPK_DisfrazPrecios);
    $rowPK = $resultPK->fetch_assoc();
    $precioPK = $rowPK['PK_DisfrazPrecios'];










    date_default_timezone_set('America/Lima');
    $fechaM = date("Y-m-d");


    if ($precioMaximo != $precioDisfraz) {


        // Actualizar la fecha final
        $sqlUpdateFechaFinalAnterior = "UPDATE DisfrazPrecios SET Dpre_FechaFinal = '$fechaM' WHERE PK_DisfrazPrecios = '$precioPK' ";
        $conex->query($sqlUpdateFechaFinalAnterior);

        $PK_Precio = uniqid();
        $FINAL = 'NULL';

        // Insertar un nuevo registro en la tabla disfrazprecios con el nuevo precio y la fecha de inicio igual a la fecha final del precio anterior
        $queryNuevoPrecio = "INSERT INTO DisfrazPrecios (PK_DisfrazPrecios, FK_Disfraz_DisfrazPrecios, Dpre_Precio, Dpre_FechaInicio, Dpre_FechaFinal) 
                    VALUES ('$PK_Precio', '$disfrazId', '$precioDisfraz', '$fechaM', '$FINAL')";
        $conex->query($queryNuevoPrecio);

    } else {

    }


    ////------------------------------------------------------------------------------------------


    //   Construir la consulta SQL para actualizar el precio----------------------------
    $sql = "UPDATE Disfraz SET Disf_Precio = '$precioDisfraz' WHERE PK_Disfraz = '$disfrazId'";
    // Ejecutar la consulta
    if ($conex->query($sql) === TRUE) {
        echo "El precio del disfraz se ha actualizado correctamente.";
    } else {
        echo "Error al actualizar el precio del disfraz: " . $conn->error;
    }
    //////////////////////////////////////
    ////
    ///










    // Construir la consulta SQL para actualizar el precio
    $sqls = "UPDATE DisfrazTalla SET Dtal_Cantidad = '$tallaS' WHERE FK_Disfraz_DisfrazTalla = '$disfrazId' AND FK_Talla_DisfrazTalla = '1' ";

    // Ejecutar la consulta
    if ($conex->query($sqls) === TRUE) {
        echo "La talla S del disfraz se ha actualizado correctamente.";
    } else {
        echo "Error al actualizar la talla S del disfraz: " . $conex->error;
    }


    // Construir la consulta SQL para actualizar el precio
    $sqlm = "UPDATE DisfrazTalla SET Dtal_Cantidad = '$tallaM' WHERE FK_Disfraz_DisfrazTalla = '$disfrazId' AND FK_Talla_DisfrazTalla = '2' ";

    // Ejecutar la consulta
    if ($conex->query($sqlm) === TRUE) {
        echo "La talla S del disfraz se ha actualizado correctamente.";
    } else {
        echo "Error al actualizar la talla S del disfraz: " . $conex->error;
    }


    // Construir la consulta SQL para actualizar el precio
    $sqll = "UPDATE DisfrazTalla SET Dtal_Cantidad = '$tallaL' WHERE FK_Disfraz_DisfrazTalla = '$disfrazId' AND FK_Talla_DisfrazTalla = '3' ";

    // Ejecutar la consulta
    if ($conex->query($sqll) === TRUE) {
        echo "La talla S del disfraz se ha actualizado correctamente.";
    } else {
        echo "Error al actualizar la talla S del disfraz: " . $conex->error;
    }




    // Aquí puedes realizar la lógica para guardar los cambios en la base de datos o en cualquier otro lugar necesario

    // Ejemplo: Actualizar los datos en la base de datos
    // $consultaSQL = "UPDATE disfraces SET nombre = '$nombreDisfraz', tematica = '$tematicaDisfraz', precio = $precioDisfraz, talla_s = $tallaS, talla_m = $tallaM, talla_l = $tallaL WHERE id = $disfrazId";
    // ... ejecutar la consulta y guardar los cambios en la base de datos

    // Mostrar un mensaje de éxito
    echo "Los cambios se han guardado correctamente.";

    header('location: index.php');

} else {
    echo "No se ha proporcionado un ID de disfraz válido.";
}
?>