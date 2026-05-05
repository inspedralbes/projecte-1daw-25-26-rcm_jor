<?php include_once "header.php";
$mysqli = include_once "connexio.php";

$return = $mysqli->query("SELECT 
    i.idIncidencia,
    i.nom,
    i.descripcio,
    i.data,
    i.prioritat,
    t.nom AS tecnic,
    d.nom AS departament,
    tp.nom AS tipus
FROM INCIDENCIA i
LEFT JOIN TECNIC t ON i.tecnic = t.idTecnic
LEFT JOIN DEPARTAMENT d ON i.departament = d.idDepartament
LEFT JOIN TIPO tp ON i.tipo = tp.idTipo");

$return2 = $mysqli->query("SELECT idTecnic,nom FROM TECNIC");

$incidencias = $return->fetch_all(MYSQLI_ASSOC);
$tecnics = $return2->fetch_all(MYSQLI_ASSOC);
?>

<header>
    <div class="container-fluid bg-dark text-white p-2 mb-2 shadow-lg text-center">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="fs-1">Llistat de les teves incidencies</div>
            </div>
            <div class="col-2">
                <div class="fs-6 pt-3">GRUP4: Ramses i Jordi</div>
            </div>
        </div>
    </div>
</header>

<div class="row">
    <div class="col-12">
        <a href="" class="btn btn-info my-2">Afegir altre incidencia</a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-10 my-2">
     <table class="table table-hover text-center">
    <thead>
        <tr>
            <th class="text-center">ID</th>
            <th colspan="2" class="text-center">Descripció</th>
            <th class="text-center">Data</th>
            <th class="text-center">Tècnic</th>
            <th class="text-center">Prioritat</th>
            <th class="text-center">Acció</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($incidencias as $incidencia) {

            $clase = "";

            if ($incidencia["prioritat"] == "Alta") {
                $clase = "table-danger";
            } elseif ($incidencia["prioritat"] == "Mitja") {
                $clase = "table-warning";
            } elseif ($incidencia["prioritat"] == "Baixa") {
                $clase = "table-info";
            } else {
                $clase = "table-primary";
            }
        ?>

        <tr class="<?php echo $clase ?>">
            <form action="assignar_incidencia.php" method="POST">

                <td class="text-center">
                    <?php echo $incidencia["idIncidencia"]; ?>
                    <input type="hidden" name="idIncidencia" value="<?php echo $incidencia["idIncidencia"]; ?>">
                </td>

                <td colspan="2" class="text-center">
                    <?php echo $incidencia["descripcio"]; ?>
                </td>

                <td class="text-center">
                    <?php echo $incidencia["data"]; ?>
                </td>

                <td class="text-center">
                    <select name="tecnic" class="form-select form-select-sm text-center">
                        <option value="">Selecciona tècnic</option>

                        <?php foreach ($tecnics as $tec) { ?>
                            <option value="<?php echo $tec["idTecnic"]; ?>"
                                <?php if ($incidencia["tecnic"] == $tec["idTecnic"]) echo "selected"; ?>>
                                <?php echo $tec["nom"]; ?>
                            </option>
                        <?php } ?>
                    </select>
                </td>

                <td class="text-center">
                    <select name="prioritat" class="form-select form-select-sm text-center">
                        <option value="">Selecciona prioritat</option>
                        <option value="Alta" <?php if ($incidencia["prioritat"] == "Alta") echo "selected"; ?>>Alta</option>
                        <option value="Mitja" <?php if ($incidencia["prioritat"] == "Mitja") echo "selected"; ?>>Mitja</option>
                        <option value="Baixa" <?php if ($incidencia["prioritat"] == "Baixa") echo "selected"; ?>>Baixa</option>
                    </select>
                </td>

                <td class="text-center">
                    <button type="submit" class="btn btn-danger btn-sm">Guardar</button>
                </td>

            </form>
        </tr>

        <?php } ?>
    </tbody>
</table>
    </div>
</div>

<?php include_once "footer.php"; ?>