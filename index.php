<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Gestión de Vuelos y Hoteles</title>
    <link rel="stylesheet" href="styles.css">

    <script>
        function validarFormulario() {
            let origen = document.forms["vueloForm"]["origen"].value;
            let destino = document.forms["vueloForm"]["destino"].value;
            if (origen == "" || destino == "") {
                alert("Todos los campos deben ser llenados");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <h2>Registrar Vuelo</h2>
    <form name="vueloForm" action="insertar_vuelo.php" onsubmit="return validarFormulario()" method="post">
        Origen: <input type="text" name="origen"><br>
        Destino: <input type="text" name="destino"><br>
        Fecha: <input type="date" name="fecha"><br>
        Plazas Disponibles: <input type="number" name="plazas_disponibles"><br>
        Precio: <input type="number" step="0.01" name="precio"><br>
        <input type="submit" value="Registrar Vuelo">
    </form>

    <h2>Registrar Hotel</h2>
    <form name="hotelForm" action="insertar_hotel.php" method="post">
        Nombre: <input type="text" name="nombre"><br>
        Ubicación: <input type="text" name="ubicación"><br>
        Habitaciones Disponibles: <input type="number" name="habitaciones_disponibles"><br>
        Tarifa por Noche: <input type="number" step="0.01" name="tarifa_noche"><br>
        <input type="submit" value="Registrar Hotel">
    </form>

    <h2>Buscar Vuelo por ID</h2>
    <form action="buscar_vuelo.php" method="post">
        ID del Vuelo: <input type="text" name="vuelo_id" required><br>
        <input type="submit" value="Buscar Vuelo">
    </form>

    <div class="container">
        <h2>Consulta de Reservas por Hotel</h2>
        <form action="consultar_reservas.php" method="post">
            <input type="submit" value="Consultar Hoteles con más de 2 Reservas">
        </form>
    </div>

</body>
</html>

