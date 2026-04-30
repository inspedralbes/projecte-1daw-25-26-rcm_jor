<?php include("header.php"); ?>
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
<main>
    <div class="d-flex justify-content-center mt-3">
        <form action="procesar.php" method="POST">
            <fieldset class="border border-secondary rounded-2 p-4">
                
                <label for="departament">Departament:</label> <br>
                <input class="mb-3 form-control" style="width: 400px;" name="Departament" id="departament" type="text"> <br>

                <label for="data">Data:</label> <br>
                <input class="mb-3 form-control" name="Data" id="data" type="date"><br>

                <label for="descripcio">Descripció:</label><br>
                <textarea class="mb-3 form-control" name="Descripcio" id="descripcio" rows="10"></textarea><br>
                <button href="index.php" type="submit" class="btn btn-primary">Enviar</button>
            </fieldset>
        </form>

    </div>
</main>
<?php include_once "footer.php"; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>