<?php
$titulo = "Registrar incidencia";
include_once "header.php"; ?>
<?php
$id = $_GET['id'];
?>

<main>
    <div class="row d-flex justify-content-center container">
        <div class="col-10 text-center mt-4">
            <div class="card text-center w-50 mx-auto shadow-lg bg-active p-3">
                <div class="card-body">
                    <h1 class="card-title">INCIDENCIA CREADA</h1>
                    <p class="card-text m-5">El teu codi d'incidencia es:</p>
                    <h2 class="fs-1"><?php echo $id; ?></h2>
                    <div class="mt-4">
                        <a href="crear.php" class="btn btn-primary w-100">Afegir una altra incidència</a>
                    </div>
                    <hr>
                    <div class="text-muted">
                        Gràcies per confiar en nosaltres!
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-auto mb-5 px-2">
            <a href="index.php" class="btn btn-danger">
                Tornar
            </a>
        </div>
</main>
<?php include_once "footer.php" ?>