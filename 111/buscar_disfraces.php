<?php
// Conexión a la base de datos
$conn = mysqli_connect("localhost", "root", "1234", "mydb");

// Verificar conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Obtener el término de búsqueda
$searchTerm = $_GET['search'];

// Consultar los disfraces filtrados por nombre
$sql = "SELECT Nombre_Disfraz FROM Disfraz WHERE Nombre_Disfraz LIKE '%$searchTerm%'";
$result = $conn->query($sql);

// Generar los resultados en formato JSON
$response = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $response[] = [
            'id' => $row['Nombre_Disfraz'],
            'text' => $row['Nombre_Disfraz']
        ];
    }
}

// Cerrar la conexión
$conn->close();

// Enviar la respuesta como JSON
header('Content-Type: application/json');
echo json_encode($response);