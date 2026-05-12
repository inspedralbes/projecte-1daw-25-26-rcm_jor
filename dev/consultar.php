<?php include_once "header.php";
$mysqli = include_once "connexio.php";
$id = $_POST["id"] ?? $_GET["id"] ?? null;

$stmt = $mysqli->prepare("
SELECT 
    i.idIncidencia,
    i.nom,
    i.descripcio,
    
    DATE_FORMAT(i.data, '%d/%m/%Y %H:%i') AS data_inici,
    
    DATE_FORMAT(i.dataFinalitzacio, '%d/%m/%Y') AS data_final,
    
    i.prioritat,
    i.estat,
    
    d.nom AS departament,
    t.nom AS tecnic,
    tp.nom AS tipus

FROM INCIDENCIA i

LEFT JOIN DEPARTAMENT d
ON i.departament = d.idDepartament

LEFT JOIN TECNIC t
ON i.tecnic = t.idTecnic

LEFT JOIN TIPO tp
ON i.tipo = tp.idTipo

WHERE i.idIncidencia = ?
");

$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();

$incidencia = $result->fetch_assoc();
$stmtAct = $mysqli->prepare("
SELECT 
    nom,
    descripcio,
    temps,
    DATE_FORMAT(data, '%d/%m/%Y %H:%i') AS data_actuacio
FROM ACTUACIO
WHERE incidencia = ?
ORDER BY data DESC
");

$stmtAct->bind_param("i", $id);
$stmtAct->execute();

$resultAct = $stmtAct->get_result();

$actuacions = $resultAct->fetch_all(MYSQLI_ASSOC);
?>
<header>
    <div class="container-fluid bg-black bg-gradient text-white p-2 mb-5 shadow text-center">
        <div class="row align-items-center">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h1 class="display-5 fw-bold mb-2">Informacio de l'incidència</h1>
            </div>
            <div class="col-md-2">
                <a href="index.php" class="badge bg-secondary px-3 py-2">GRUP 4: Ramses i Jordi</a>
            </div>
        </div>
    </div>
</header>
<div class="row m-4 justify-content-center">
    <div class="col-5">
        <form action="" method="POST" class="form-group">
            <div class="card shadow-lg border-0 rounded-4">

                <div class="card-header bg-dark text-white">
                    <h2 class="mb-0">
                        Informació de la incidència #<?php echo $id; ?>
                    </h2>
                </div>

                <div class="card-body">

                    <h4>Títol</h4>

                    <p class="fs-5">
                        <?php echo htmlspecialchars($incidencia["nom"]); ?>
                    </p>

                    <div class="row g-4">

                        <div class="col-md-4">
                            <h5>Estat</h5>

                            <span class="badge bg-primary fs-6">
                               <?= htmlspecialchars($incidencia["estat"]?? "Sense gestionar"); ?>
                            </span>
                        </div>

                        <div class="col-md-4">
                            <h5>Prioritat</h5>

                            <?php
                            $color = match ($incidencia["prioritat"]) {
                                'Alta' => 'danger',
                                'Mitja' => 'warning',
                                'Baixa' => 'info',
                                default => 'secondary'
                            };
                            ?>

                            <span class="badge bg-<?php echo $color; ?> fs-6">
                                <?php echo htmlspecialchars($incidencia["prioritat"] ?? "Sense gestionar"); ?>
                            </span>
                        </div>

                        <div class="col-md-4">
                            <h5>Tipus</h5>

                            <p>
                                <?php echo htmlspecialchars($incidencia["tipus"] ?? "Sense gestionar"); ?>
                            </p>
                        </div>

                        <div class="col-md-3">
                            <h5>Tècnic</h5>
                            <p><?php echo htmlspecialchars($incidencia["tecnic"] ?? "Sense gestionar"); ?></p>
                        </div>

                    </div>

                    <hr class="my-4">

                    <h4>Descripció</h4>

                    <div class="border rounded p-3 bg-light">

                        <?php echo htmlspecialchars($incidencia["descripcio"]); ?>

                    </div>
                </div>
                <div class="row m-4 ">

                    <div class="col-md-6">

                        <h5>Data inici</h5>

                        <div class="border rounded p-2 bg-light">
                            <?php echo htmlspecialchars($incidencia["data_inici"]); ?>
                        </div>

                    </div>

                    <div class="col-md-6">

                        <h5>Data finalització</h5>

                        <div class="border rounded p-2 bg-light">

                            <?php
                            if ($incidencia["data_final"] != null) {
                                echo htmlspecialchars($incidencia["data_final"]);
                            } else {
                                echo "Encara oberta";
                            }
                            ?>

                        </div>

                    </div>

                </div>


            </div>
        </form>
    </div>
    <div class="col-1 d-flex justify-content-center align-items-stretch">
        <div class="vr"></div>
    </div>
    <div class="col-5">
        <h3 class="mb-4">Actuacions del tècnic</h3>

        <?php if (empty($actuacions)) { ?>

            <div class="alert alert-warning">
                No hi ha actuacions registrades.
            </div>

        <?php } else { ?>

            <?php foreach ($actuacions as $act) { ?>

                <div class="card mb-3 shadow-sm">

                    <div class="card-body">

                        <h5 class="card-title">
                            <?php echo htmlspecialchars($act["nom"]); ?>
                        </h5>

                        <p class="mb-2">
                            <?php echo nl2br(htmlspecialchars($act["descripcio"])); ?>
                        </p>

                        <div class="d-flex justify-content-between text-muted">

                            <small>
                                ⏱ Temps: <?php echo $act["temps"]; ?> min
                            </small>

                            <small>
                                📅 <?php echo $act["data_actuacio"]; ?>
                            </small>

                        </div>

                    </div>

                </div>

            <?php } ?>

        <?php } ?>

    </div>
</div>

<?php include_once "footer.php";
?>