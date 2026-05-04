<?php include_once "header.php"; ?>
<header>
    <div class="container-fluid bg-dark text-white p-2 mb-5 shadow-lg text-center">
        <div class="row">
            <div class="col-2">
                <img class="img-fluid" style="width: 80px;"
                    src="https://lh3.googleusercontent.com/sitesv/AA5AbUD5FqRdWpu9LzNLp_qxjenHkBb6gIg0-WuDgrrFLCrLVt_kXMiNXY4nKx5ywk84vV9-BG4sJHTBs-CO_O6iXxKC_iLlvajPxyL4zTj2ksM0_l2Gic3hq8s9dSyieFwas4xa8wiScF50XWwqiSkooYCLNiB5v3NLDe7BdpuxfZF7iPLTi37zAXGPfGPZ3FqWg4D2PCoWMx4ttPCM00t_eMzYMedPuTe2SelT=w1280"
                    alt="">
            </div>

            <div class="col-8">
                <div class="fs-1">Gestió de les teves incidències</div>
            </div>

            <div class="col-2">
                <div class="fs-6 pt-3">GRUP4: Ramses i Jordi</div>
            </div>
        </div>
    </div>
</header>

<main class="container mt-5 d-flex flex-column align-items-center gap-4">

    <!-- PROFESOR -->
    <div class="card w-50 shadow">
        <div class="card-body text-center">
            <h5 class="card-title">Professor</h5>
            <p class="card-text">Accés per crear incidències</p>

            <a href="crear.php" class="btn btn-primary w-100">
                Entrar
            </a>
        </div>
    </div>

    <!-- TECNIC -->
    <div class="card w-50 shadow">
        <div class="card-body text-center">
            <h5 class="card-title">Tecnic</h5>
            <p class="card-text">Gestió d'incidències assignades</p>

            <a href="Tecnics.php" class="btn btn-primary w-100">
                Entrar
            </a>
        </div>
    </div>

    <!-- ADMINISTRADOR -->
    <div class="card w-50 shadow">
        <div class="card-body text-center">
            <h5 class="card-title">Administrador</h5>
            <p class="card-text">Control total del sistema</p>

            <a href="estat.php" class="btn btn-primary w-100">
                Entrar
            </a>
        </div>
    </div>

</main>

<?php include_once "footer.php"; ?>