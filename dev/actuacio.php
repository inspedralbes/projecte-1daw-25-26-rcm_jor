<?php include_once "header.php";
$idIncidencia = $_GET["id"];
$mysqli = include_once "connexio.php";

include_once "log.php";
registrarAcceso("actuació.php");

?>
<header>
    <div class="container-fluid bg-black bg-gradient text-white p-2 mb-5 shadow text-center">
        <div class="row align-items-center">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h1 class="display-5 fw-bold mb-2">Registra la teva actuacio</h1>
            </div>
            <div class="col-md-2">
                <a href="index.php" class="badge bg-secondary px-3 py-2">GRUP 4: Ramses i Jordi</a>
            </div>
        </div>
    </div>
</header>
<div class="row justify-content-center">
    <div class="col-8 mt-5">
        <h1>Registra actuacio</h1>
        <form action="regis_actuacio.php" method="POST" class="form-group">
            <input type="hidden" name="idIncidencia" value="<?php echo $idIncidencia; ?>">
            <div class="card">
                <div class="card-body p-5">

                    <h5>Descripció</h5>
                    <textarea class="form-control" name="descripcio" placeholder="Afegeix una descripció..."
                        rows="3"></textarea>

                    <h5 class="mt-4">Temps dedicat:</h5>
                    <input type="number" class="form-control mt-3 w-50" name="temps">

                    <h5 class="mt-4">Visible per l'usuari:</h5>

                    <div class="form-check form-switch mt-2">
                        <input class="form-check-input" type="checkbox" name="visible" value="1" id="visibleUsuari">

                        <label class="form-check-label" for="visibleUsuari">
                            Visible
                        </label>
                    </div>

                    <div class="row">
                        <div class="col-5 mt-4 d-flex gap-4">

                            <button type="submit" class="btn btn-outline-success">
                                Registrar
                            </button>

                            <button type="submit" class="btn btn-outline-danger">
                                Tancar
                            </button>

                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>