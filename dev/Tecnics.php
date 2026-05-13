<?php include_once "header.php";
$mysqli = include_once "connexio.php";

$return = $mysqli->query("SELECT 
    idTecnic,
    nom
FROM TECNIC");

$tecnics = $return->fetch_all(MYSQLI_ASSOC); 

include_once "log.php";
registrarAcceso("tecnics.php");
?>

<header>
    <div class="container-fluid bg-black bg-gradient text-white p-2 mb-5 shadow text-center">
        <div class="row align-items-center">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h1 class="display-5 fw-bold mb-2">Llistar de les teves incidències</h1>
            </div>
            <div class="col-md-2">
                <a href="index.php" class="badge bg-secondary px-3 py-2 shadow bg-gradient"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z" />
                    </svg></a>
            </div>
        </div>
    </div>
</header>

<div class="text-center m-5 text-white">
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
<div class="mt-auto mb-5 px-2">
    <a href="index.php" class="btn btn-danger">
        Tornar
    </a>
</div>
<footer class="px-2 py-2 fixed-bottom bg-black text-center d-flex align-items-center justify-content-center shadow">
<?php include_once "footer.php"; ?>