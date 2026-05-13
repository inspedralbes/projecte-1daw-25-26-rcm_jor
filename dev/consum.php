<?php
include_once "header.php";
$mysqli = include_once "connexio.php";

$sql = "SELECT d.nom AS departament, 
               (SELECT COUNT(*) FROM INCIDENCIA i WHERE i.departament = d.idDepartament) AS n_inc,
               (SELECT IFNULL(SUM(a.temps), 0) FROM ACTUACIO a WHERE a.incidencia IN (SELECT idIncidencia FROM INCIDENCIA WHERE departament = d.idDepartament)) AS t_total 
        FROM DEPARTAMENT d";

$resultat = $mysqli->query($sql);
$dades = $resultat->fetch_all(MYSQLI_ASSOC);
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
                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z" />
                    </svg></a>
            </div>
        </div>
    </div>
</header>
<main class="container mt-5">

    <table class="table table-bordered table-striped">
        <div class="table-dark">
            <tr>
                <th>Departament</th>
                <th>Incidències Reportades</th>
                <th>Temps Total (min)</th>
            </tr>
        </div>
        <?php foreach ($dades as $fila): ?>
            <tr>
                <td><?= $fila['departament'] ?></td>
                <td><?= $fila['n_inc'] ?></td>
                <td><?= $fila['t_total'] ?> minuts</td>
            </tr>
        <?php endforeach; ?>
    </table>
</main>
<div class="mt-auto mb-5 px-2">
    <a href="admin.php" class="btn btn-danger">
        Tornar
    </a>
</div>


<?php include_once "footer.php"; ?>