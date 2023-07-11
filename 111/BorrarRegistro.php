<?php
session_start();
include_once('conec.php');

if (isset($_GET['id'])) {
    try {
        $id = $_GET['id'];
        $sql = "DELETE FROM Cliente WHERE Id_Cliente = '$id'";
        // Ejecutamos la consulta utilizando el método query
        $_SESSION['message'] = ($conex->query($sql)) ? 'Cliente borrado' : 'Hubo un error al borrar el cliente';
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
    }

    // Cerrar la conexión
    $conex->close();
} else {
    $_SESSION['message'] = 'Selecciona un cliente para eliminar primero';
}

header('location: inde.php');
?>