<?php
$mysqli = include_once "connexio.php";

// Recoger datos
$departament = $_POST['Departament'];
$data = $_POST['Data'];
$descripcio = $_POST['Descripcio'];

// Preparar consulta
$stmt = $mysqli->prepare("INSERT INTO INCIDENCIA (departament, data, descripcio) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $departament, $data, $descripcio);

// Ejecutar
$stmt->execute();

//per obtenir l'ultim id
$last_id = $mysqli->insert_id;

// Cerrar
$stmt->close();
$mysqli->close();

// Redirigir
header("Location: creada.php?id=" . $last_id);
exit();
?>
