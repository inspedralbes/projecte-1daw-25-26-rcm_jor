<?php
$titulo = "Registrar actuació";
include_once "header.php";
$idIncidencia = $_GET["id"];
$mysqli = include_once "connexio.php";

include_once "log.php";
registrarAcceso("actuació.php");

?>
<div class="row justify-content-center">
    <div class="col-8 mt-5">
        <h1>Registra actuacio</h1>
        <form action="regis_actuacio.php" method="POST" class="form-group">
            <input type="hidden" name="idIncidencia" value="<?php echo $idIncidencia; ?>">
            <div class="card">
                <div class="card-body p-5">

                    <h2 class="fs-4">Descripció</h2>
                    <textarea class="form-control" name="descripcio" placeholder="Afegeix una descripció..."
                        rows="3" required></textarea>

                    <h2 class="mt-4">Temps dedicat:</h2>
                    <select class="form-control mt-3 w-50" name="temps" required>
                        <option value="" disabled selected>Selecciona el temps...</option>
                        <option value="5">5 minuts</option>
                        <option value="15">15 minuts</option>
                        <option value="30">30 minuts</option>
                        <option value="60">60 minuts</option>
                        <option value="100">+60 minuts</option>
                    </select>

                    <h2 class="mt-4">Visible per l'usuari:</h2>

                    <div class="form-check form-switch mt-2">
                        <input class="form-check-input" type="checkbox" name="visible" value="1" id="visibleUsuari">

                        <label class="form-check-label" for="visibleUsuari">
                            Visible
                        </label>
                    </div>

                    <div class="row">
                        <div class="col-5 mt-4 d-flex gap-4">

                            <button type="submit" class="btn btn-outline-success" name="accio" value="registrar">
                                Registrar
                            </button>

                            <button type="submit" class="btn btn-outline-danger" name="accio" value="tancar">
                                Tancar
                            </button>

                        </div>
                    </div>

                </div>
            </div>
        </form>
<div class="mt-3 mb-5 px-2">
            <a href="index.php" class="btn btn-danger">
                Tornar
            </a>
        </div>
    </div>
</div>
