<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agencia";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$vuelo_id = $_POST['vuelo_id'];

// Preparar y ejecutar la consulta
$sql = "SELECT * FROM vuelo WHERE id_vuelo = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error en la preparación de la consulta: " . $conn->error);
}

$stmt->bind_param("i", $vuelo_id);
$stmt->execute();
$result = $stmt->get_result();

// Mostrar resultados
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id_vuelo"] . " - Origen: " . $row["origen"] . " - Destino: " . $row["destino"] . " - Fecha: " . $row["fecha"] . " - Plazas Disponibles: " . $row["plazas_disponibles"] . " - Precio: " . $row["precio"] . "<br>";
    }
} else {
    echo "No hay vuelos";
}

$stmt->close();
$conn->close();
?>
