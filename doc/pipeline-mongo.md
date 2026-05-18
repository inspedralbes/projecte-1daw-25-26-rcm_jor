# Com funciona el comptador de visites? (MongoDB Pipelines)

A la nostra web tenim una pantalla d'estadístiques (`stats.php`) que mostra un gràfic i una taula amb les pàgines més visitades. Per treure aquesta informació de la base de dades de manera eficient, fem servir un **Pipeline de MongoDB**.

Imagina-t'ho com una línia de muntatge: entren tots els registres de visites barrejats i en surten endreçats, netes i llistes per utilitzar.

## El codi que fem servir a PHP

```php
$paginas_cursor = $collection->aggregate([
    ['$group' => ['_id' => '$page', 'total' => ['$sum' => 1]]],
    ['$sort' => ['total' => -1]]
]);
