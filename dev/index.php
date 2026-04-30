<?php include_once "header.php"; ?>
<header>
    <div class="container-fluid bg-dark text-white p-2 mb-2 shadow-lg text-center">
        <div class="row">
            <div class="col-2">
                <img class="img-fluid" style="width: 80px;"
                    src="https://lh3.googleusercontent.com/sitesv/AA5AbUD5FqRdWpu9LzNLp_qxjenHkBb6gIg0-WuDgrrFLCrLVt_kXMiNXY4nKx5ywk84vV9-BG4sJHTBs-CO_O6iXxKC_iLlvajPxyL4zTj2ksM0_l2Gic3hq8s9dSyieFwas4xa8wiScF50XWwqiSkooYCLNiB5v3NLDe7BdpuxfZF7iPLTi37zAXGPfGPZ3FqWg4D2PCoWMx4ttPCM00t_eMzYMedPuTe2SelT=w1280"
                    alt="">
            </div>
            <div class="col-8">
                <div class="fs-1">Gestió de les teves incidencies</div>
            </div>
            <div class="col-2">
                <div class="fs-6 pt-3">GRUP4: Ramses i Jordi</div>
            </div>
        </div>
    </div>
</header>
<main>
    <div class="card w-50">
        <div class="card-body">
            <h5 class="card-title">Profesor</h5>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Escull usuari
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="crear.php">Juan</a></li>
                    <li><a class="dropdown-item" href="estat.php">Maria</a></li>
                </ul>
            </div>
        </div>
    </div>
    <br>
    <div class="card w-50">
        <div class="card-body">
            <h5 class="card-title">Tecnic</h5>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Escull usuari
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="estat.php">Juan</a></li>
                    <li><a class="dropdown-item" href="estat.php">Maria</a></li>
                </ul>
            </div>
        </div>
    </div>
    <br>
    <div class="card w-50">
        <div class="card-body">
            <h5 class="card-title">Administrador</h5>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Escull usuari
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="estat.php">Juan</a></li>
                    <li><a class="dropdown-item" href="estat.php">Maria</a></li>
                </ul>
            </div>
        </div>
    </div>
    <?php include_once "footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    </body>

    </html>