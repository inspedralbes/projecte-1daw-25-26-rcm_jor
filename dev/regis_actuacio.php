<?php
include_once "connexio.php";

// DATOS DEL FORMULARIO
$idIncidencia = $_POST["idIncidencia"];
$descripcio = $_POST["descripcio"];
$temps = $_POST["temps"];

// TOGGLE (visible = 1 o 0)
$visible = isset($_POST["visible"]) ? 1 : 0;

// OPCIÓN BOTONES (registrar o tancar)
$accio = $_POST["accio"] ?? "registrar";


// 1. INSERTAR ACTUACIÓ
$stmt = $mysqli->prepare("
INSERT INTO ACTUACIO (nom, descripcio, temps, incidencia, visible)
VALUES (?, ?, ?, ?, ?)
");

// puedes poner un nombre automático o fijo
$nom = "Actuació tècnic";

$stmt->bind_param(
    "ssiii",
    $nom,
    $descripcio,
    $temps,
    $idIncidencia,
    $visible
);

$stmt->execute();


// 2. SI ES "TANCAR" INCIDÈNCIA
if ($accio == "tancar") {

    $stmt2 = $mysqli->prepare("
        UPDATE INCIDENCIA
        SET estat = 'Resolta',
            dataFinalitzacio = NOW()
        WHERE idIncidencia = ?
    ");

    $stmt2->bind_param("i", $idIncidencia);
    $stmt2->execute();
}


// 3. REDIRECCIÓN FINAL
header("Location: consultar.php?id=" . $idIncidencia );
exit;
?>