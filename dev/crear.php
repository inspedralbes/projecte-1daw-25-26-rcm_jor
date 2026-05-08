<?php include("header.php");
$mysqli = include_once "connexio.php";

$departaments = $mysqli->query("
    SELECT idDepartament, nom 
    FROM DEPARTAMENT
")->fetch_all(MYSQLI_ASSOC);
?>
<header>
    <div class="container-fluid bg-dark text-white p-2 mb-2 shadow-lg text-center">
        <div class="row">
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
    <!-- CONSULTAR -->
    <div class="d-flex justify-content-center">
        <form action="consultar.php" method="POST" style="width: 100%; max-width: 600px;">
            <fieldset class="border border-secondary rounded-2 p-3 w-100 mt-4">
                <legend>Consulta incidencia:</legend>
                <label for="id">Introdueix el codi d'incidencia:</label> <br>
                <input class="mb-3 form-control" name="Consultar" id="id" type="number"><br>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </fieldset>
        </form>
    </div>

    <!-- REGISTRAR -->
    <div class="d-flex justify-content-center">
        <form action="registrar_incidencia.php" method="POST" style="width: 100%; max-width: 600px;">
            <fieldset class="border border-secondary rounded-2 p-3 w-100 mt-4">
                <legend>Registrar nova incidencia</legend>

                <label for="departament">Departament:</label><br>
                <select class="form-select w-100" name="Departament" id="departament">
                    <option value="">Posa el teu departament</option>

                    <?php foreach ($departaments as $dep) { ?>
                        <option value="<?php echo $dep["idDepartament"]; ?>">
                            <?php echo $dep["nom"]; ?>
                        </option>
                    <?php } ?>
                </select> <br>

                <label for="data">Data:</label> <br>
                <input class="mb-3 form-control" name="Data" id="data" type="date"><br>

                <label for="descripcio">Descripció:</label><br>
                <textarea class="form-control" name="Descripcio" id="descripcio" rows="2"></textarea><br>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </fieldset>
        </form>
    </div>
    <a href="index.php" class="btn btn-danger m-2">Tornar</a>
</main>
<?php include_once "footer.php"; ?>
</body>

</html>
