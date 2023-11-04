<?php
// Conexión a la base de datos (asegúrate de proporcionar tus propios datos de conexión)
$servername = "localhost";
$username = "root";
$password = "";
$database = "food_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recopila los datos del formulario
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$mesa = $_POST['mesa'];
$num_personas = $_POST['num_personas'];
$comentario = $_POST['comentario'];

// Prepara la consulta SQL para insertar los datos en la tabla
$sql = "INSERT INTO reservas (nombre, telefono, fecha, hora, mesa, num_personas, comentario)
        VALUES ('$nombre', '$telefono', '$fecha', '$hora', '$mesa', $num_personas, '$comentario')";

if ($conn->query($sql) === TRUE) {
    echo '<div style="text-align: center; background-color: #4CAF50; color: #fff; padding: 20px; border-radius: 10px;">';
    echo '<img src="images/moso.png" alt="Reserva exitosa" style="max-width: 100%; height: auto; margin-bottom: 20px;">';
    echo '<h2 style="font-size: 28px;">¡Reserva exitosa!</h2>';
    echo '<p style="font-size: 18px; margin-bottom: 20px;">Gracias por elegir nuestro restaurante. Esperamos verte pronto.</p>';
    echo '<a href="home.php" style="background-color: #007BFF; color: #fff; text-decoration: none; padding: 15px 30px; border-radius: 5px; font-size: 20px;">Regresar </a>';
    echo '</div>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



// Cierra la conexión a la base de datos
$conn->close();
?>
