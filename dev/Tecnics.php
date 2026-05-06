<?php include_once "header.php"; 
$mysqli = include_once "connexio.php";

$return = $mysqli->query("SELECT 
    idTecnic,
    nom
FROM TECNIC");

$tecnics = $return->fetch_all(MYSQLI_ASSOC);?>

<header>
    <div class="container-fluid bg-dark text-white p-2 mb-2 shadow-lg text-center">
        <div class="row">
            <div class="col-2">
                <img class="img-fluid" style="width: 80px;"
                    src="https://lh3.googleusercontent.com/sitesv/AA5AbUD5FqRdWpu9LzNLp_qxjenHkBb6gIg0-WuDgrrFLCrLVt_kXMiNXY4nKx5ywk84vV9-BG4sJHTBs-CO_O6iXxKC_iLlvajPxyL4zTj2ksM0_l2Gic3hq8s9dSyieFwas4xa8wiScF50XWwqiSkooYCLNiB5v3NLDe7BdpuxfZF7iPLTi37zAXGPfGPZ3FqWg4D2PCoWMx4ttPCM00t_eMzYMedPuTe2SelT=w1280"
                    alt="">
            </div>
            <div class="col-8">
                <div class="fs-1">Llistat de les teves incidencies</div>
            </div>
            <div class="col-2">
                <div class="fs-6 pt-3">GRUP4: Ramses i Jordi</div>
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

<?php include_once "footer.php"; ?>
