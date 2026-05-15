<?php
$mysqli=include_once "connexio.php";

// DATOS DEL FORMULARIO
$idIncidencia = $_POST["idIncidencia"];
$descripcio = $_POST["descripcio"];
$temps = $_POST["temps"];

$visible = isset($_POST["visible"]) ? 1 : 0;

$accio = $_POST["accio"] ?? "registrar";


$stmt = $mysqli->prepare("
INSERT INTO ACTUACIO (nom, descripcio, temps, incidencia, visible)
VALUES (?, ?, ?, ?, ?)
");

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