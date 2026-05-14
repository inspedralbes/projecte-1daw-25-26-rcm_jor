<?php
$titulo = "Estadístiques d'accés";
include_once "header.php";
require __DIR__ . '/vendor/autoload.php';

$client = new MongoDB\Client("mongodb://root:example@mongo:27017");
$collection = $client->analytics->acces_logs;

$total = $collection->countDocuments();

// Obtenemos los datos para la tabla y el gráfico
$paginas_cursor = $collection->aggregate([
    ['$group' => ['_id' => '$page', 'total' => ['$sum' => 1]]],
    ['$sort' => ['total' => -1]]
]);

// Convertimos el cursor a un array para poder usarlo dos veces (tabla y JS)
$paginas = iterator_to_array($paginas_cursor);

// Preparamos los datos para JavaScript
$labels = [];
$valores = [];
foreach ($paginas as $p) {
    $labels[] = $p['_id'];   // Nombre de la página
    $valores[] = $p['total']; // Cantidad de visitas
}
?>


<main class="container my-4 text-white">

    <h3>El número total de clics en la web es: <b><?php echo $total; ?></b></h3>
    <hr>

    <div class="row">
        <div class="col-md-7">
            <div class="card bg-dark text-white shadow">
                <div class="card-body">
                    <h5 class="card-title">Tendencia de Visitas por Página</h5>
                    <!-- El Canvas para Chart.js -->
                    <canvas id="graficoVisitas" style="max-height: 400px;"></canvas>
                </div>
            </div>
        </div>

        <!-- Tabla de Datos -->
        <div class="col-md-5">
            <h3>Páginas más vistas</h3>
            <table class="table table-dark table-bordered table-striped">
                <thead>
                    <tr>
                        <th>URL de la Página</th>
                        <th>Veces visitada</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($paginas as $p): ?>
                    <tr>
                        <td><?php echo $p['_id']; ?></td>
                        <td><?php echo $p['total']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <br><br>
    <a href="index.php" class="btn btn-danger">Tornar</a>
</main>

<!-- Cargamos Chart.js desde CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Pasamos los datos de PHP a JavaScript usando json_encode
    const labelsPaginas = <?php echo json_encode($labels); ?>;
    const datosVisitas = <?php echo json_encode($valores); ?>;

    const ctx = document.getElementById('graficoVisitas').getContext('2d');
    
    new Chart(ctx, {
        type: 'line', // Tipo de gráfico: lineal
        data: {
            labels: labelsPaginas,
            datasets: [{
                label: 'Número de Visitas',
                data: datosVisitas,
                fill: true,
                backgroundColor: 'rgba(13, 110, 253, 0.2)', // Azul Bootstrap con transparencia
                borderColor: 'rgba(13, 110, 253, 1)',     // Azul Bootstrap sólido
                borderWidth: 3,
                tension: 0.3, // Suaviza la línea
                pointBackgroundColor: '#fff',
                pointRadius: 5
            }]
        },
        options: {
            responsive: true,
            resizeDelay: 200,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { color: '#fff' }
                },
                x: {
                    ticks: { color: '#fff' } // Color de los nombres en el eje X
                }
            },
            plugins: {
                legend: {
                    labels: { color: '#fff' } // Color de la leyenda
                }
            }
        }
    });
</script>

<?php include_once "footer.php"; ?>