<?php
$mysqli = new mysqli(
    "db",          
    "ram_jor",
    "1234",
    "incidencies"
);

if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

return $mysqli;