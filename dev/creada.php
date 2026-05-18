<?php
$titulo = "Registrar incidencia";
include_once "header.php"; ?>
<?php
$id = $_GET['id'];
?>

<main class="container mt-5 d-flex flex-column align-items-center">
    
    <div class="row w-100 justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 text-center">
            
            <div class="card text-center w-100 mx-auto shadow-lg bg-active p-3">
                <div class="card-body">
                    <h1 class="card-title h2">INCIDENCIA CREADA</h1>
                    <p class="card-text my-4">El teu codi d'incidencia es:</p>
                    <h2 class="fs-1 text-primary fw-bold"><?php echo $id; ?></h2>
                    
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
    </div>

    <div class="mt-4 mb-5 text-center">
        <a href="index.php" class="btn btn-danger">
            Tornar
        </a>
    </div>
    
</main>

<?php include_once "footer.php" ?>
