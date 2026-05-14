<?php 
$titulo = "Administrar Incidències";
include_once "header.php";
$mysqli = include_once "connexio.php";

include_once "log.php";
registrarAcceso("admin.php");

$return = $mysqli->query("SELECT 
    i.nom AS titol,
    i.estat,
    i.idIncidencia,
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
ORDER BY i.idIncidencia");

$return2 = $mysqli->query("SELECT idTecnic, nom FROM TECNIC");
$return3 = $mysqli->query("SELECT idTipo, nom FROM TIPO");

$incidencias = $return->fetch_all(MYSQLI_ASSOC);
$tecnics = $return2->fetch_all(MYSQLI_ASSOC);
$tipus = $return3->fetch_all(MYSQLI_ASSOC);

$stmt2 = $mysqli->query("SELECT COUNT(*) AS TOTAL FROM INCIDENCIA WHERE estat = 'Resolta'");
$total_tancades = $stmt2->fetch_assoc();

$stmt3 = $mysqli->query("SELECT COUNT(*) AS TOTAL FROM INCIDENCIA WHERE estat = 'Procesada'");
$total_procesadas = $stmt3->fetch_assoc();

$stmt4 = $mysqli->query("SELECT COUNT(*) AS TOTAL FROM INCIDENCIA WHERE estat = 'Registrada'");
$total_registrades = $stmt4->fetch_assoc();
?>

<div class="row mb-4 mt-4">
    <div class="col-12 text-center">
        <h2>Estadístiques Generals</h2>
    </div>
</div>

<div class="row justify-content-center gap-2 mb-2">
    <div class="col-3 border rounded shadow p-3 my-incidencia" id="pepe">
        <h3 class="text-center">Incidències Registrades</h3>
        <h4 class="text-center text-info"><?php echo $total_registrades["TOTAL"]; ?></h4>

    </div>
    <div class="col-3 border rounded shadow p-3 my-incidencia">
        <h3 class=" text-center">Incidències Procesades</h3>
        <h4 class="text-center text-warning"><?php echo $total_procesadas["TOTAL"]; ?></h4>

    </div>
    <div class="col-3 border rounded shadow p-3 my-incidencia">
        <h3 class=" text-center">Incidències resoltes</h3>
        <h4 class="text-center text-success"><?php echo $total_tancades["TOTAL"]; ?></h4>

    </div>
</div>

<div class="row justify-content-center">
    <div class="col-11 my-2">
        <table class="table table-hover align-middle text-center">
            <thead class="table ">
                <tr>
                    <th>Titulo</th>
                    <th>Estat</th>
                    <th>Departament</th>
                    <th>Tipus</th>
                    <th>Data</th>
                    <th>Tècnic</th>
                    <th>Prioritat</th>
                    <th>Acció</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($incidencias as $incidencia): 
                    $clase = match($incidencia["prioritat"]) {
                        'Alta' => 'table-danger',
                        'Mitja' => 'table-warning',
                        'Baixa' => 'table-info',
                        default => 'table-light',
                    };
                ?>
                <tr class="<?php echo $clase ?>">
                    <form action="assignar_incidencia.php" method="POST">
                        <input type="hidden" name="idIncidencia" value="<?php echo $incidencia['idIncidencia']; ?>">

                        <td class="text-center"><?php echo $incidencia["titol"]; ?></td>

                        <td class="text-center"><?php echo $incidencia["estat"]?></td>
                        
                        <td><span class="badge bg-secondary"><?php echo $incidencia["departament"]; ?></span></td>

                        <td class="text-center">
                            <select name="tipus" class="form-select form-select-sm w-50 mx-auto" required>
                                <option value="">Selecciona tipus</option>
                                <?php foreach ($tipus as $t): ?>
                                    <option value="<?php echo $t["idTipo"]; ?>"
                                        <?php if ($incidencia["id_tipo_actual"] == $t["idTipo"]) echo "selected"; ?>>
                                        <?php echo $t["nom"]; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>

                        <td style="white-space: nowrap;"><?php echo $incidencia["data_formatejada"]; ?></td>

                        <td>
                            <select name="tecnic" class="form-select form-select-sm w-50 mx-auto" required>
                                <option value="">Sense assignar</option>
                                <?php foreach ($tecnics as $tec): ?>
                                    <option value="<?php echo $tec["idTecnic"]; ?>"
                                        <?php if ($incidencia["id_tecnic_actual"] == $tec["idTecnic"]) echo "selected"; ?>>
                                        <?php echo $tec["nom"]; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>

                        <td>
                            <select name="prioritat" class="form-select form-select-sm" required>
                                <option value="Alta" <?php echo ($incidencia["prioritat"] == "Alta") ? "selected" : ""; ?>>Alta</option>
                                <option value="Mitja" <?php echo ($incidencia["prioritat"] == "Mitja") ? "selected" : ""; ?>>Mitja</option>
                                <option value="Baixa" <?php echo ($incidencia["prioritat"] == "Baixa") ? "selected" : ""; ?>>Baixa</option>
                            </select>
                        </td>

                        <td>
                            <button type="submit" class="btn btn-success btn-sm w-100">Assignar</button>
                        </td>
                    </form>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="mx-2 mb-5 mt-auto px-2">
        <a href="index.php" class="btn btn-danger">Tornar</a>
        <a href="consum.php" class="btn btn-info">Consum per departaments</a>
        <a href="stats.php" class="btn btn-info">Estadístiques d'Accés</a>
    </div>
<?php include_once "footer.php"; ?>
