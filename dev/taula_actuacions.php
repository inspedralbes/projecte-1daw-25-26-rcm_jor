<?php 
$titulo = "Taula de Actuacions";
include_once "header.php";
$mysqli = include_once "connexio.php";

include_once "log.php";
registrarAcceso("actuacions.php");

// QUERY: Seleccionamos los datos de la actuación
$return = $mysqli->query("SELECT 
                T.nom AS tecnico,
                I.idIncidencia AS id,
                I.prioritat,
                I.estat AS estat,
                A.temps AS tiempo,
                A.descripcio AS actuacion,
                DATE_FORMAT(A.data, '%d/%m/%Y %H:%i') AS fecha
            FROM INCIDENCIA I
            JOIN TECNIC T ON I.tecnic = T.idTecnic
            JOIN ACTUACIO A ON A.incidencia = I.idIncidencia
            ORDER BY A.data DESC");

$actuaciones = $return->fetch_all(MYSQLI_ASSOC);
?>

<div class="row mb-4 mt-4">
    <div class="col-12 text-center">
        <h2>Detall de les Actuacions Realitzades</h2>
        <hr class="w-50 mx-auto">
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-11 my-2">
        <table class="table table-hover align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>Tècnic Responsable</th>
                    <th>ID Incidència</th>
                    <th>Temps Dedicat</th>
                    <th>Prioritat</th>
                    <th>Data i Hora</th>
                    <th>Descripció de l'Actuació</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($actuaciones as $act): 
                    // LA LÓGICA DEBE IR AQUÍ DENTRO PARA CADA FILA
                    $clase = match ($act["prioritat"]) {
                        'Alta' => 'danger',
                        'Mitja' => 'warning',
                        'Baixa' => 'info',
                        default => 'secondary',
                    };
                ?>
                    <tr>
                        <td class="fw-bold"><?php echo $act["tecnico"]; ?></td>
                        <td><span class="badge bg-primary">#<?php echo $act["id"]; ?></span></td>
                        <td>
                            <span class="badge bg-light text-dark border px-3">
                                <?php echo $act["tiempo"]; ?> minuts
                            </span>
                        </td>
                        <td>
                            <span class="badge bg-<?php echo $clase; ?> text-dark w-75">
                                <?php echo $act["prioritat"]; ?>
                            </span>
                        </td>
                        
                        <td style="white-space: nowrap;"><?php echo $act["fecha"]; ?></td>
                        <td class="text-center small"><?php echo $act["actuacion"]; ?></td>
                    </tr>
                <?php endforeach; ?>

                <?php if (empty($actuaciones)): ?>
                    <tr>
                        <td colspan="6" class="text-center py-4">No s'han trobat actuacions registrades.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="mx-2 mb-5 mt-auto px-2">
    <a href="admin.php" class="btn btn-danger">Tornar</a>
    <a href="admin.php" class="btn btn-warning">Administrar Incidències</a>
    <a href="consum.php" class="btn btn-info text-white">Consum per departaments</a>
    <a href="stats.php" class="btn btn-info text-white">Estadístiques d'Accés</a>
</div>

<?php include_once "footer.php"; ?>