<?php include("header.php");
$mysqli = include_once "connexio.php";

include_once "log.php";
registrarAcceso("crear.php");

$departaments = $mysqli->query("
    SELECT idDepartament, nom 
    FROM DEPARTAMENT
")->fetch_all(MYSQLI_ASSOC);

require 'vendor/autoload.php';
$client = new MongoDB\Client("mongodb://root:example@mongo:27017");
$collection = $client->analytics->access_logs;

$collection->insertOne([
    "page" => $_SERVER['REQUEST_URI'],
    "user" => "admin",
    "date" => date("Y-m-d H:i:s")
]);
?>
<header>
    <div class="container-fluid bg-black bg-gradient text-white mb-1 p-2 shadow text-center">
        <div class="row align-items-center">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h1 class="display-5 fw-bold mb-2">Registrar incidències</h1>
            </div>
            <div class="col-md-2">
                <a href="index.php" class="badge bg-secondary px-3 py-2 shadow bg-gradient"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z" />
                    </svg></a>
            </div>
        </div>
    </div>
</header>
<main class="text-white">

    <!-- CONSULTAR -->
    <div class="d-flex justify-content-center">
        <form action="consultar.php" method="POST" style="width: 100%; max-width: 600px;">
            <fieldset class="border border-secondary rounded-2 p-3 w-100 mt-4">
                <legend>Consulta incidencia:</legend>
                <label for="id">Introdueix el codi d'incidencia:</label> <br>
                <input class="mb-3 form-control" name="id" id="id" type="number"><br>
                <button type="submit" class="btn btn-outline-success">Consultar</button>
            </fieldset>
        </form>
    </div>

    <!-- REGISTRAR -->
    <div class="d-flex justify-content-center">
        <form action="registrar_incidencia.php" method="POST" style="width: 100%; max-width: 600px;">
            <fieldset class="border border-secondary rounded-2 p-3 w-100 mt-4">
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

                <label class="mt-3" for="data">Titol:</label> <br>
                <input class="form-control" name="Titol" id="data" type="Text" maxlength="50"><br>

                <label for="descripcio">Descripció:</label><br>
                <textarea class="form-control" name="Descripcio" id="descripcio" rows="2"></textarea><br>
                <button type="submit" class="btn btn-outline-success">Registrar</button>
            </fieldset>
        </form>
    </div>
    <div class="mx-2 mb-5">
        <a href="index.php" class="btn btn-danger">Tornar</a>
    </div>
</main>

<script>
document.querySelectorAll('form').forEach(form => {
    form.onsubmit = function(e) {
        const camps = form.querySelectorAll('input, select, textarea');
        let buit = false;

        camps.forEach(camp => {
            if (camp.value.trim() === "") {
                buit = true;
            }
        });

        if (buit) {
            e.preventDefault(); 
            alert("Error: Has d'omplir tots els camps"); 
        }
    };
});
</script>

<?php include_once "footer.php"; ?>
</body>

</html>