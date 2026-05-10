<?php include_once "header.php"; ?>
<?php
$id = $_GET['id'];
?>
<header>
    <div class="container-fluid bg-black bg-gradient text-white p-2 mb-5 shadow text-center">
        <div class="row align-items-center">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h1 class="display-5 fw-bold mb-2">Generació d'incidències</h1>
            </div>
            <div class="col-md-2">
                <a href="index.php" class="badge bg-secondary px-3 py-2">GRUP 4: Ramses i Jordi</a>
            </div>
        </div>
    </div>
</header>

<main>
    <div class="row d-flex justify-content-center">
        <div class="col-10 text-center mt-4">
            <div class="card text-center w-50 mx-auto shadow-lg bg-primary p-3">
                <div class="card-body text-white">
                    <h1 class="card-title">INCIDENCIA CREADA</h1>
                    <p class="card-text m-5">El teu codi d'incidencia es:</p>
                    <h2 class="fs-1"><?php echo $id; ?></h2>
                    <div class="mt-4">
                        <a href="crear.php" class="btn btn-info w-100">Afegir una altra incidència</a>
                    </div>
                    <hr>
                </div>
                <div class="text-muted text-white">
                    Gràcies per confiar en nosaltres!
                </div>
            </div>
        </div>
    </div>
    <a href="index.php" class="btn btn-danger m-3">Tornar</a>
</main>
<?php include_once "footer.php" ?>