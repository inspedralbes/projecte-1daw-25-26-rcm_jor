<?php include("header.php");
$mysqli = include_once "connexio.php";

$departaments = $mysqli->query("
    SELECT idDepartament, nom 
    FROM DEPARTAMENT
")->fetch_all(MYSQLI_ASSOC);
?>
<header>
    <div class="container-fluid bg-black bg-gradient text-white p-2 shadow text-center">
        <div class="row align-items-center">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h1 class="display-5 fw-bold mb-2">Gestionar incidències</h1>
            </div>
            <div class="col-md-2">
                <div class="badge bg-secondary px-3 py-2">GRUP 4: Ramses i Jordi</div>
            </div>
        </div>
    </div>
</header>
<main class="text-white">

    <!-- CONSULTAR -->
    <div class="d-flex justify-content-center">
        <form action="consultar.php" method="POST" style="width:600px;">
            <fieldset class="border border-black shadow bg-gradient bg-primary rounded-2 p-3 mt-4">
                <legend>Consulta incidencia:</legend>
                <label for="id">Introdueix el codi d'incidencia:</label> 
                <input class=" form-control" name="Consultar" id="id" type="number">
                <button type="submit" class="btn btn-success mt-3">Enviar</button>
            </fieldset>
        </form>
    </div>

    <!-- REGISTRAR -->
    <div class="d-flex justify-content-center mt-4">
        <form action="registrar_incidencia.php" method="POST" style="width:600px;">
            <fieldset class="border border-black shadow bg-gradient bg-primary rounded-2 p-3 mt-">
                <legend>Registrar nova incidencia</legend>

                <label for="departament">Departament:</label>
                <select class="form-select" name="Departament" id="departament">
                    <option value="">Posa el teu departament</option>

                    <?php foreach ($departaments as $dep) { ?>
                        <option value="<?php echo $dep["idDepartament"]; ?>">
                            <?php echo $dep["nom"]; ?>
                        </option>
                    <?php } ?>
                </select> 

                <label class="mt-2" for="data">Data:</label>
                <input class="form-control" name="Data" id="data" type="date">
                <label class="mt-2" for="descripcio">Descripció:</label>
                <textarea class="form-control" name="Descripcio" id="descripcio" rows="2"></textarea>
                <button type="submit" class="btn btn-success mt-3">Enviar</button>
            </fieldset>
        </form>
    </div>
    <a href="index.php" class="btn btn-danger m-2">Tornar</a>
</main>
<?php include_once "footer.php"; ?>
</body>

</html>