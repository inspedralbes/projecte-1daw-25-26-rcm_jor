<?php include_once "header.php"; ?>
<?php
$id = $_GET['id'];
?>
<header>
    <div class="container-fluid bg-dark text-white p-2 mb-2 shadow-lg text-center">
        <div class="row">
            <div class="col-2">
                <img class="img-fluid" style="width: 80px;"
                    src="https://lh3.googleusercontent.com/sitesv/AA5AbUD5FqRdWpu9LzNLp_qxjenHkBb6gIg0-WuDgrrFLCrLVt_kXMiNXY4nKx5ywk84vV9-BG4sJHTBs-CO_O6iXxKC_iLlvajPxyL4zTj2ksM0_l2Gic3hq8s9dSyieFwas4xa8wiScF50XWwqiSkooYCLNiB5v3NLDe7BdpuxfZF7iPLTi37zAXGPfGPZ3FqWg4D2PCoWMx4ttPCM00t_eMzYMedPuTe2SelT=w1280"
                    alt="">
            </div>
            <div class="col-8">
                <div class="fs-1">Registrar incidencia</div>
            </div>
            <div class="col-2">
                <div class="fs-6 pt-3">GRUP4: Ramses i Jordi</div>
            </div>
        </div>
    </div>
</header>
<div class="row d-flex justify-content-center">
    <div class="col-10 text-center mt-4">
        <div class="card text-center w-50 mx-auto shadow-lg p-3">
            <div class="card-header">
            </div>
            <div class="card-body">
                <h1 class="card-title">INCIDENCIA CREADA</h1>
                <p class="card-text m-5">El teu codi d'incidencia es:</p>
                <h2><?php echo $id; ?></h2>

                <hr class="my-4">

                <div class="mt-4">
                    <p class="text-muted">Vols veure l'esta de la teva incidencia?</p>
                    <form action="" class="d-flex gap-2 justify-content-center">
                        <input type="number" class="from-control" name="id" placeholder="Introdueix el teu id" required>
                        <button type="submit" class="btn btn-outline-secondary">Consulta</button>
                    </form>
                </div>
                <div class="mt-4">
                    <a href="crear.php" class="btn btn-primary w-100">Afegir una altra incidència</a>
                </div>
            </div>
            <div class="card-footer text-muted">
                2 days ago
            </div>
        </div>
    </div>
</div>

<?php include_once "footer.php"?>
