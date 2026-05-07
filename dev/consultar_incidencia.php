<?php

$mysqli = include_once "connexio.php";

// Recoger datos
$descripcio = $_POST['Descripcio'];
$temps = $_POST['Temps'];
$incidencia = $_POST['Incidencia'];
$visible = $_POST['Visible'];

// Preparar consulta
$stmt = $mysqli->prepare("
    INSERT INTO ACTUACIO 
    (descripcio, temps, incidencia, visible) 
    VALUES (?, ?, ?, ?)
");

$stmt->bind_param("siii", 
    $descripcio,
    $temps,
    $incidencia,
    $visible
);

// Ejecutar
$stmt->execute();

// Cerrar
$stmt->close();
$mysqli->close();

// Redirigir
header("Location: consultar.php?id=" . $incidencia);
exit();

?>
