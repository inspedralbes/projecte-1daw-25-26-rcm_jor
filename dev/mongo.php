<?php

require __DIR__ . '/vendor/autoload.php';

use MongoDB\Client;

try {
    $client = new Client("mongodb://root:example@mongo:27017");

} catch (Exception $e) {
    die("Error de conexión MongoDB: " . $e->getMessage());
}
