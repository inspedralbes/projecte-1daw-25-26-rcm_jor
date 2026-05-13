<?php
require __DIR__ . '/vendor/autoload.php';

function registrarAcceso($pagina) {
    try {
        $client = new MongoDB\Client("mongodb://root:example@mongo:27017");
        $collection = $client->analytics->acces_logs;


        $collection->insertOne([
            'page' => $pagina,
            'user' => 'Anonimo',
        ]);

    } catch (Exception $e) {
        echo "Error en Mongo: " . $e->getMessage();
    }
}