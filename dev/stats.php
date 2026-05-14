<?php
$titulo = "Estadístiques d'accés";
include_once "header.php";
require __DIR__ . '/vendor/autoload.php';

$client = new MongoDB\Client("mongodb://root:example@mongo:27017");
$collection = $client->analytics->acces_logs;

$total = $collection->countDocuments();

$paginas = $collection->aggregate([
    ['$group' => ['_id' => '$page', 'total' => ['$sum' => 1]]],
    ['$sort' => ['total' => -1]]
]);
?>

<main class="container my-4 text-white">

    <h3>El número total de clics en la web es: <b><?php echo $total; ?></b></h3>
    <hr>
    <h3>Páginas más vistas</h3>
    <table class="table table-bordered table-striped">
        <tr>
            <th>URL de la Página</th>
            <th>Veces visitada</th>
        </tr>
        <?php foreach ($paginas as $p): ?>
        <tr>
            <td><?php echo $p['_id']; ?></td>
            <td><?php echo $p['total']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <br><br>
<a href="admin.php" class="btn btn-danger">
        Tornar
    </a>
</div>

<?php include_once "footer.php"; ?>