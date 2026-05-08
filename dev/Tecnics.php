<?php include_once "header.php"; 
$mysqli = include_once "connexio.php";

$return = $mysqli->query("SELECT 
    idTecnic,
    nom
FROM TECNIC");

$tecnics = $return->fetch_all(MYSQLI_ASSOC);?>

<header>
    <div class="container-fluid bg-black bg-gradient text-white p-2 mb-5 shadow text-center">
        <div class="row align-items-center">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h1 class="display-5 fw-bold mb-2">Llistar de les teves incidències</h1>
            </div>
            <div class="col-md-2">
                <div class="badge bg-secondary px-3 py-2">GRUP 4: Ramses i Jordi</div>
            </div>
        </div>
    </div>
</header>

<div class="text-center m-5">
    <h1>Selecciona el tecnic</h1>
</div>


<div class="d-flex justify-content-center">
    <div class="d-grid gap-3" style="width: 400px;">
      <?php
foreach ($tecnics as $tecnic) {
    $id = $tecnic["idTecnic"];

     echo "<a class='btn btn-warning mb-2 w-100' href='tecnic.php?id=$id'>"
        . $tecnic["nom"] .
        "</a>";
}
?>

    </div>
</div>
<a href="index.php" class="btn btn-danger m-3">Tornar</a>

<?php include_once "footer.php"; ?>
