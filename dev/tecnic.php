<?php
$titulo = "Llistar incidències per tècnic";
include_once "header.php";
$mysqli = include_once "connexio.php";
$id = $_GET['id'];

$stmt = $mysqli->prepare("SELECT 
    i.idIncidencia,
    i.nom,
    i.descripcio,
    DATE_FORMAT(i.data, '%d/%m/%Y') AS data_formatejada,
    i.prioritat,
    i.tecnic AS id_tecnic_actual,
    i.tipo AS id_tipo_actual,
    t.nom AS nom_tecnic,
    d.nom AS departament,
    tp.nom AS nom_tipus
FROM INCIDENCIA i
LEFT JOIN TECNIC t ON i.tecnic = t.idTecnic
LEFT JOIN DEPARTAMENT d ON i.departament = d.idDepartament
LEFT JOIN TIPO tp ON i.tipo = tp.idTipo
WHERE i.tecnic = ?
ORDER BY i.idIncidencia DESC");

$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$incidencias = $result->fetch_all(MYSQLI_ASSOC);

$return2 = $mysqli->query("SELECT idTecnic, nom FROM TECNIC");
$return3 = $mysqli->query("SELECT idTipo, nom FROM TIPO");

$tecnics = $return2->fetch_all(MYSQLI_ASSOC);
$tipus = $return3->fetch_all(MYSQLI_ASSOC);

$stmt2 = $mysqli->query("SELECT COUNT(*) AS TOTAL FROM INCIDENCIA WHERE tecnic = $id AND estat = 'Resolta'");
$total_tancades = $stmt2->fetch_assoc();

$stmt3 = $mysqli->query("SELECT COUNT(*) AS TOTAL FROM INCIDENCIA WHERE tecnic = $id AND estat = 'Procesada'");
$total_procesadas = $stmt3->fetch_assoc();

?>

<div class="row justify-content-center">
    <div class="col-11 my-2">
        <table class="table table-hover align-middle text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titol</th>
                    <th>Departament</th>
                    <th>Tipus</th>
                    <th>Data</th>
                    <th>Prioritat</th>
                    <th>Acció</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($incidencias as $incidencia):
                    $clase = match ($incidencia["prioritat"]) {
                        'Alta' => 'danger',
                        'Mitja' => 'warning',
                        'Baixa' => 'info',
                        default => 'secondary',
                    };
                ?>
                    <tr>
                        <form action="afegir_actuacio.php" method="POST">

                        <td>
                            <strong><?php echo $incidencia["idIncidencia"]; ?></strong>
                            <input type="hidden" name="id" value="<?php echo $incidencia["idIncidencia"]; ?>">
                        </td>

                        <td class="text-center">
                            <?php echo $incidencia["nom"]; ?>
                        </td>

                        <td>
                            <span class="badge bg-secondary">
                                <?php echo $incidencia["departament"]; ?>
                            </span>
                        </td>

                        <td>
                            <?php
                                foreach ($tipus as $t) {
                                    if ($incidencia["id_tipo_actual"] == $t["idTipo"]) {
                                        echo $t["nom"];
                                    }
                                }
                                ?>
                        </td>

                        <td style="white-space: nowrap;">
                            <?php echo $incidencia["data_formatejada"]; ?>
                        </td>

                        <td>
                            <span class="badge bg-<?php echo $clase; ?> text-white w-75">
                                <?php echo $incidencia["prioritat"]; ?>
                            </span>
                        </td>

                        <td>
                            <button type="submit" class="btn btn-primary btn-sm w-100">
                                Veure Informacio
                            </button>
                        </td>

                    </form>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="mt-auto mb-5 px-2">
    <a href="Tecnics.php" class="btn btn-danger">
        Tornar
    </a>
</div>

<?php include_once "footer.php"; ?>