<?php

require __DIR__ . '/vendor/autoload.php';

use MongoDB\Client;

try {
    $client = new Client("mongodb://root:example@mongo:27017");

    $client->admin->command(['ping' => 1]);

} catch (Exception $e) {
    die("Error de conexión MongoDB: " . $e->getMessage());
}

//poner en cada archivo que necesite mongo
require 'vendor/autoload.php';
$client = new MongoDB\Client("mongodb://root:example@mongo:27017");
$collection = $client->analytics->access_logs;

$collection->insertOne([
    "page" => $_SERVER['REQUEST_URI'],
    "user" => "admin",
    "date" => date("Y-m-d H:i:s")
]);