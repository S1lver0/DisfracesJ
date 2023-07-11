<?php
// Verificar si se recibió el ID del disfraz a editar
if(isset($_GET['id'])) {
    $disfrazId = $_GET['id'];
    
    // Obtener los datos enviados desde el formulario
    $precioDisfraz = $_POST['Precio_Disfraz'];
    $tallaS = $_POST['CS'];
    $tallaM = $_POST['CM'];
    $tallaL = $_POST['CL'];

    include_once('conec.php');

    // Construir la consulta SQL para actualizar el precio
    $sql = "UPDATE Disfraz SET Disf_Precio = '$precioDisfraz' WHERE PK_Disfraz = '$disfrazId'";

    // Ejecutar la consulta
    if ($conex->query($sql) === TRUE) {
        echo "El precio del disfraz se ha actualizado correctamente.";
    } else {
        echo "Error al actualizar el precio del disfraz: " . $conex->error;
    }






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