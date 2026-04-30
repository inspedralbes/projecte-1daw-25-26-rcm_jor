<?php
// Datos de conexión
$host = "localhost";
$user = "ram_jor";
$pass = "1234";
$db = "incidencies";

// Conexión
$conn = new mysqli($host, $user, $pass, $db);

// Comprobar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Recoger datos
$departament = $_POST['Departament'];
$data = $_POST['Data'];
$descripcio = $_POST['Descripció'];

// Preparar consulta
$stmt = $conn->prepare("INSERT INTO incidencias (departament, data, descripcio) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $departament, $data, $descripcio);

// Ejecutar
$stmt->execute();

// Cerrar
$stmt->close();
$conn->close();

// Redirigir
header("Location: creada.php");
exit();
?>