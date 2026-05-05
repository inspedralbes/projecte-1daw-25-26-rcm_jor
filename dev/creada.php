<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>codi incidencia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
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
                    <div class="fs-1">Incidencia Registrada</div>
                </div>
                <div class="col-2">
                    <div class="fs-6 pt-3">GRUP4: Ramses i Jordi</div>
                </div>
            </div>
        </div>
    </header>
    <main class="text-center">
        <p class="fs-4 mt-5">El teu codi d'incidencia es:
            <?php
            $conn = new mysqli("db", "ram_jor", "1234", "incidencies");
            $res = $conn->query("SELECT idIncidencia FROM INCIDENCIA ORDER BY idIncidencia DESC LIMIT 1");
            echo $res->fetch_assoc()["idIncidencia"];
            ?>
        </p>
        <div class="mt-5">
        <a href="llistar.php" class="btn btn-primary me-3">Torna al llistat d'incidencies</a>
        <a href="index.php" class="btn btn-warning me-3">Torna a l'inici</a>
        <a href="crear.php" class="btn btn-primary me-3">Crear altre incidencia</a>
        </div>
    </main>
    <?php include_once "footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>
