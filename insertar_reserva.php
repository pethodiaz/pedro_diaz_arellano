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

$sql = "SELECT * FROM RESERVA";
$result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    echo "<h2>Contenido de la tabla RESERVA</h2>";
    echo "<table border='1'>";
    echo "<tr><th>ID Reserva</th><th>ID Cliente</th><th>Fecha Reserva</th><th>ID Vuelo</th><th>ID Hotel</th></tr>";
    // Mostrar cada fila de resultados
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["id_reserva"]."</td>";
        echo "<td>".$row["id_cliente"]."</td>";
        echo "<td>".$row["fecha_reserva"]."</td>";
        echo "<td>".$row["id_vuelo"]."</td>";
        echo "<td>".$row["id_hotel"]."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron reservas en la tabla RESERVA";
}

// Cerrar conexión
$conn->close();
?>
