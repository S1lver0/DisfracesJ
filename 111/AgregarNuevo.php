<?php
session_start();
include_once('conec.php');

if (isset($_POST['agregar'])) {
    try {
        $nombres = $_POST['Nombre_Cliente'];
        $apellidos = $_POST['Apellido_Cliente'];
        $dni = $_POST['Dni_Cliente'];
        $domicilio = $_POST['Domicilio_Cliente'];
        $celular = $_POST['Celular_Cliente'];

        // Verificar si el DNI ya está registrado
        $stmt_check_dni = $conex->prepare("SELECT COUNT(*) AS count FROM Cliente WHERE Dni_Cliente = ?");
        $stmt_check_dni->bind_param("s", $dni);
        $stmt_check_dni->execute();
        $result_check_dni = $stmt_check_dni->get_result();
        $row_check_dni = $result_check_dni->fetch_assoc();
        $count = $row_check_dni['count'];

        if ($count > 0) {
            $_SESSION['message'] = 'El cliente ya está registrado';
        } else {
            // Obtener el máximo valor actual del ID y sumar 1
            $sql_max_id = "SELECT MAX(Id_Cliente) AS max_id FROM Cliente";
            $result_max_id = $conex->query($sql_max_id);
            $row_max_id = $result_max_id->fetch_assoc();
            $max_id = $row_max_id['max_id'];
            $new_id = $max_id + 1;

            $stmt = $conex->prepare("INSERT INTO Cliente (Id_Cliente, Nombre_Cliente, Apellido_Cliente, Dni_Cliente, Domicilio_Cliente, Celular_Cliente) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("isssss", $new_id, $nombres, $apellidos, $dni, $domicilio, $celular);
            $stmt->execute();

            $_SESSION['message'] = 'Cliente guardado correctamente';
        }
    } catch (Exception $e) {
        $_SESSION['message'] = 'Algo salió mal. No se puede agregar el cliente';
    }

    // Cerrar la conexión
    $stmt_check_dni->close();
    
    $conex->close();
}

header('location: inde.php');
?>