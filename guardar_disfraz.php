<?php
session_start();

// Verificar si se han enviado los datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Declaramos las variables de conexión
    $ServerName = "srv1006.hstgr.io";
    $Username = "u472469844_grupo2";
    $Password = "8BM#rs11";
    $NameBD = "u472469844_grupo2";

    // Creamos la conexión con MySQL
    $conex = new mysqli($ServerName, $Username, $Password, $NameBD);

    // Revisamos la Conexión MySQL
    if ($conex->connect_error) {
        die("Ha fallado la conexión: " . $conex->connect_error);
    }

    // Recuperar los datos del formulario
    $nombreDisfraz = $_POST['Nombre_Disfraz'];
    $tematicaDisfraz = $_POST['Tematica_Disfraz'];
    $precioDisfraz = $_POST['Precio_Disfraz'];
    $cantidadS = $_POST['CS'];
    $cantidadM = $_POST['CM'];
    $cantidadL = $_POST['CL'];

    // Generar un ID único
    $disfrazID = uniqid();

    // Preparar la consulta para insertar en la tabla "disfraz"
    $queryDisfraz = "INSERT INTO Disfraz (PK_Disfraz, Disf_Nombre, Disf_Precio, FK_Tematica_Disfraz) VALUES ('$disfrazID', '$nombreDisfraz', '$precioDisfraz', '$tematicaDisfraz')";
    $conex->query($queryDisfraz);

    // Generar IDs únicos para disfraztalla
    $tallaSID = uniqid();
    $tallaMID = uniqid();
    $tallaLID = uniqid();

    $tallaS = '1';
    // Preparar la consulta para insertar en la tabla "disfraztalla"
    $queryTallaS = "INSERT INTO DisfrazTalla (PK_DisfrazTalla, Dtal_Cantidad, FK_Talla_DIsfrazTalla, FK_Disfraz_DisfrazTalla) VALUES ('$tallaSID', '$cantidadS', '$tallaS', '$disfrazID')";
    $conex->query($queryTallaS);

    $tallaM = '2';
    // Preparar la consulta para insertar en la tabla "disfraztalla"
    $queryTallaM = "INSERT INTO DisfrazTalla (PK_DisfrazTalla, Dtal_Cantidad, FK_Talla_DIsfrazTalla, FK_Disfraz_DisfrazTalla) VALUES ('$tallaMID', '$cantidadM', '$tallaM', '$disfrazID')";
    $conex->query($queryTallaM);

    $tallaL = '3';
    // Preparar la consulta para insertar en la tabla "disfraztalla"
    $queryTallaL = "INSERT INTO DisfrazTalla (PK_DisfrazTalla, Dtal_Cantidad, FK_Talla_DIsfrazTalla, FK_Disfraz_DisfrazTalla) VALUES ('$tallaLID', '$cantidadL', '$tallaL', '$disfrazID')";
    $conex->query($queryTallaL);

    // Cerrar las consultas y la conexión
    $conex->close();

    $_SESSION['message'] = 'Disfraz guardado correctamente';

    $PK_Inventario = uniqid();
    $Estado = 1;

    // Construir la consulta para la tabla "inventario"
    $queryInventario = "INSERT INTO Inventario (PK_Inventario, FK_Estado_Inventario, FK_Disfraz_Inventario) VALUES ('$PK_Inventario', '$Estado', '$disfrazID')";
    $conex = new mysqli($ServerName, $Username, $Password, $NameBD);
    $conex->query($queryInventario);
    $conex->close();
    } else {
        $_SESSION['message'] = 'Disfraz error';
    }



    header('location: index.php');

    ?>