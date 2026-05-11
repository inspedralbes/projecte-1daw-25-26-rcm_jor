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
                <a href="index.php" class="badge bg-secondary px-3 py-2 shadow bg-gradient"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
  <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
</svg></a>
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
    <div class="mx-2 mb-5">
        <a href="index.php" class="btn btn-danger">Tornar</a>
    </div>
</main>
<?php include_once "footer.php" ?>