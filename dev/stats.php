<?php
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
<header>
    <div class="container-fluid bg-black bg-gradient text-white p-2 mb-2 shadow text-center">
        <div class="row align-items-center">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h1 class="display-5 fw-bold mb-2">Estadístiques d'acces</h1>
            </div>
            <div class="col-md-2">
                <a href="index.php" class="badge bg-secondary px-3 py-2 shadow bg-gradient"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z" />
                    </svg></a>
            </div>
        </div>
    </div>
</header>
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
<a href="index.php" class="btn btn-danger">
        Tornar
    </a>
</div>

<?php include_once "footer.php"; ?>