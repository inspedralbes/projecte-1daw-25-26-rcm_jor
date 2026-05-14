<?php
$titulo = "Registrar incidencia";
include_once "header.php";
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

<main class="text-white">

    <div class="d-flex justify-content-center" style="height: 400px;">
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
</main>
  <div class="mt-auto mb-5 px-2">
        <a href="index.php" class="btn btn-danger">
            Tornar
        </a>
    </div>

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