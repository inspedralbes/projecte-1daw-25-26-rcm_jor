<?php include_once "header.php";
$mysqli = include_once "connexio.php";

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
?>


<header>
    <div class="container-fluid bg-black bg-gradient text-white p-2 shadow text-center">
        <div class="row align-items-center">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h1 class="display-5 fw-bold mb-2">Administrar incidències</h1>
            </div>
            <div class="col-md-2">
                <a href="index.php" class="badge bg-secondary px-3 py-2 shadow bg-gradient"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
  <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
</svg></a>
            </div>
        </div>
    </div>
</header>

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
<div class="mx-2 mb-5">
        <a href="index.php" class="btn btn-danger">Tornar</a>
    </div>
<?php include_once "footer.php"; ?>
