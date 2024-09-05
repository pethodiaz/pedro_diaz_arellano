<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "AGENCIA";

// Crea la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta avanzada para contar las reservas por hotel
$sql = "SELECT h.nombre AS nombre_hotel, COUNT(r.id_reserva) AS num_reservas
        FROM HOTEL h
        INNER JOIN RESERVA r ON h.id_hotel = r.id_hotel
        GROUP BY h.id_hotel
        HAVING COUNT(r.id_reserva) > 2";

$result = $conn->query($sql);

// Verificar si hay resultados y mostrarlos
if ($result->num_rows > 0) {
    echo "<h2>Hoteles con más de 2 Reservas:</h2>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>{$row['nombre_hotel']} - Reservas: {$row['num_reservas']}</li>";
    }
    echo "</ul>";
} else {
    echo "No se encontraron hoteles con más de 2 reservas.";
}

// Cerrar conexión
$conn->close();
?>
