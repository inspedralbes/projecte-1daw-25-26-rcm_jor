<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$mysqli = include_once "connexio.php";

$id = $_POST["idIncidencia"];
$prioritat = $_POST["prioritat"];
$tecnic = $_POST["tecnic"];

$stmt = $mysqli->prepare("UPDATE INCIDENCIA SET prioritat = ?, tecnic = ? WHERE idIncidencia = ?");
$stmt->bind_param("sii", $prioritat, $tecnic, $id);
$stmt->execute();

header("Location: admin.php");