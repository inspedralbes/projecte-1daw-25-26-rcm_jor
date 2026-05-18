<?php 
$titulo = "Llistar incidències per tècnic";
include_once "header.php";
$mysqli = include_once "connexio.php";

$return = $mysqli->query("SELECT 
    idTecnic,
    nom
FROM TECNIC");

$tecnics = $return->fetch_all(MYSQLI_ASSOC); 

include_once "log.php";
registrarAcceso("tecnics.php");
?>

<div class="text-center m-5 text-dark">
    <h1>Selecciona el tecnic:</h1>
</div>


<div class="d-flex justify-content-center">
    <div class="d-grid gap-3" style="width: 400px;">
        <?php
        foreach ($tecnics as $tecnic) {
            $id = $tecnic["idTecnic"];

            echo "<a class='btn btn-warning mb-2 w-100' href='informe_tecnics.php?id=$id'>"
                . $tecnic["nom"] .
                "</a>";
        }
        ?>

    </div>
</div>
<div class="mt-auto mb-5 px-2">
    <a href="admin.php" class="btn btn-danger">
        Tornar
    </a>
</div>
<footer class="px-2 py-2 fixed-bottom bg-black text-center d-flex align-items-center justify-content-center shadow">
<?php include_once "footer.php"; ?>
