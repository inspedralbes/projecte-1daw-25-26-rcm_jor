<?php
$titulo = "Consum per departament";
include_once "header.php";
$mysqli = include_once "connexio.php";

$sql = "SELECT d.nom AS departament, 
               (SELECT COUNT(*) FROM INCIDENCIA i WHERE i.departament = d.idDepartament) AS n_inc,
               (SELECT IFNULL(SUM(a.temps), 0) FROM ACTUACIO a WHERE a.incidencia IN (SELECT idIncidencia FROM INCIDENCIA WHERE departament = d.idDepartament)) AS t_total 
        FROM DEPARTAMENT d";

$resultat = $mysqli->query($sql);
$dades = $resultat->fetch_all(MYSQLI_ASSOC);
?>

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