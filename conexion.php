<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "AGENCIA";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
 die("Conexión fallida - ERROR de conexión: " . $conn->connect_error);
}
echo "Conexión exitosa a la base de datos AGENCIA";
?>
