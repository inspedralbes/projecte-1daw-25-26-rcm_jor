<?php include_once "header.php";
$mysqli = include_once"connexio.php";


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
                <div class="fs-1">Llistat de les teves incidencies</div>
            </div>
            <div class="col-2">
                <div class="fs-6 pt-3">GRUP4: Ramses i Jordi</div>
            </div>
        </div>
    </div>
</header>
<div class="row justify-content-center">
    <div class="col-8 mt-5">
        <h1>Registra actuacio</h1>
        <form action="regis_actuacio.php" class="form-group">
            <div class="card">
                <div class="card-body p-5">

                    <h5>Descripció</h5>
                    <textarea class="form-control" name="descripcio" placeholder="Afegeix una descripció..."
                        rows="3"></textarea>

                    <h5 class="mt-4">Temps dedicat:</h5>
                    <input type="number" class="form-control mt-3 w-50">

                    <h5 class="mt-4">Visible per l'usuari:</h5>

                    <div class="form-check form-switch mt-2">
                        <div class="mt-4">
                            <input class="form-check-input" type="checkbox" id="visibleUsuari" name="visibleUsuari">

                            <label class="form-check-label" for="visibleUsuari">
                                Visible
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-5 mt-4 d-flex gap-4"><button type="submit" class="btn btn-outline-success">Registrar</button>
                            <button type="submit" class="btn btn-outline-danger">Tancar</button>
                        </div>

                    </div>

                </div>
            </div>
        </form>
    </div>
</div>