<?php 
$titulo = "Estadístiques del Tècnic";
include_once "header.php";
$mysqli = include_once "connexio.php";

include_once "log.php";
registrarAcceso("tecnic.php");

// Obtener ID del técnico
$idTecnic = $_GET["id"];

// QUERY preparada
$stmt = $mysqli->prepare("
    SELECT 
        t.idTecnic,
        t.nom AS tecnico,
        i.estat,
        COUNT(i.idIncidencia) AS total_incidencias
    FROM TECNIC t
    LEFT JOIN INCIDENCIA i 
        ON t.idTecnic = i.tecnic
    WHERE t.idTecnic = ?
    GROUP BY t.idTecnic, t.nom, i.estat
    ORDER BY i.estat
");

$stmt->bind_param("i", $idTecnic);

$stmt->execute();

$result = $stmt->get_result();

$estadistiques = $result->fetch_all(MYSQLI_ASSOC);

// Arrays para Chart.js
$labels = [];
$valores = [];

foreach ($estadistiques as $fila) {
    $labels[] = $fila["estat"] ?? "Sense estat";
    $valores[] = $fila["total_incidencias"];
}

// Nombre del técnico
$nomTecnic = $estadistiques[0]["tecnico"] ?? "Tècnic";
?>

<div class="row mb-4 mt-4">
    <div class="col-12 text-center">
        <h2>Estadístiques del tècnic <?php echo $nomTecnic; ?></h2>
        <hr class="w-50 mx-auto">
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-10 border rounded shadow p-4">
        <canvas id="graficoIncidencias"></canvas>
    </div>
</div>

<div class="mx-2 mb-5 mt-4 px-2">
    <a href="tecnic_stats.php" class="btn btn-danger">Tornar</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Datos desde PHP
    const labelsEstados = <?php echo json_encode($labels); ?>;
    const datosIncidencias = <?php echo json_encode($valores); ?>;

    const ctx = document.getElementById('graficoIncidencias').getContext('2d');

    new Chart(ctx, {
        type: 'bar', // Gráfico de columnas
        data: {
            labels: labelsEstados,
            datasets: [{
                label: 'Número d\'Incidències',
                data: datosIncidencias,
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            resizeDelay: 200,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    }
                }
            }
        }
    });
</script>

<?php include_once "footer.php"; ?>