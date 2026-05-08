<?php include("header.php");

$mysqli = include_once "connexio.php";

$idIncidencia = $_POST['Consultar'] ?? $_GET['id'] ?? null;

if (!$idIncidencia) {
    echo "No s'ha proporcionat cap incidència.";
    exit();
}

// INCIDENCIA
$stmt = $mysqli->prepare("
    SELECT * 
    FROM INCIDENCIA 
    WHERE idIncidencia = ?
");

$stmt->bind_param("i", $idIncidencia);
$stmt->execute();
$incidencia = $stmt->get_result()->fetch_assoc();

// ACTUACIONS (SOLO VISIBLES)
$stmt2 = $mysqli->prepare("
    SELECT * 
    FROM ACTUACIO 
    WHERE incidencia = ? 
    AND visible = 1
    ORDER BY data DESC
");

$stmt2->bind_param("i", $idIncidencia);
$stmt2->execute();
$actuacions = $stmt2->get_result();

?>

<header>
    <div class="container-fluid bg-dark text-white p-2 mb-2 shadow-lg text-center">
        <div class="fs-1">Consultar incidencia</div>
    </div>
</header>

<main class="container">

<?php if ($incidencia) { ?>
    <div class="card p-3 mb-3">
        <h3>Incidència #<?php echo $incidencia['idIncidencia']; ?></h3>
        <p><b>Descripció:</b> <?php echo $incidencia['descripcio']; ?></p>
        <p><b>Data:</b> <?php echo $incidencia['data']; ?></p>
    </div>

    <div class="card p-3">

        <h4>Actuacions visibles</h4>
        <?php if ($actuacions->num_rows > 0) { ?>
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Descripció</th>
                    <th>Data</th>
                    <th>Temps</th>
                </tr>

                <?php while ($a = $actuacions->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $a['idActuacio']; ?></td>
                        <td><?php echo $a['descripcio']; ?></td>
                        <td><?php echo $a['data']; ?></td>
                        <td><?php echo $a['temps']; ?> min</td>
                    </tr>
                <?php } ?>
            </table>

        <?php } else { ?>
            <p>No hi ha actuacions visibles.</p>
        <?php } ?>

    </div>

<?php } else { ?>
    <div class="alert alert-danger">
        Incidència no trobada.
    </div>
<?php } ?>

<a href="crear.php" class="btn btn-danger mt-3">Tornar</a>

</main>

<?php
$stmt->close();
$stmt2->close();
$mysqli->close();

include_once "footer.php";
?>
