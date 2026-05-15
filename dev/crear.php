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
?>

<main class="text-dark">

    <div class="d-flex justify-content-center">
        <form action="registrar_incidencia.php" method="POST" style="width: 100%; max-width: 600px;">
            <fieldset class="border border-secondary rounded-2 p-3 mt-4 shadow-lg">
                <legend>Registrar nova incidencia</legend>

                <label for="departament">Departament:</label>
                <select class="form-select border-secondary" name="Departament" id="departament">
                    <option value="">Posa el teu departament</option>

                    <?php foreach ($departaments as $dep) { ?>
                        <option value="<?php echo $dep["idDepartament"]; ?>">
                            <?php echo $dep["nom"]; ?>
                        </option>
                    <?php } ?>
                </select>

                <label class="mt-4" for="data">Titol:</label> <br>
                <input class="form-control border-secondary" name="Titol" id="data" type="Text" maxlength="50"><br>

                <label class="mt-2" for="descripcio">Descripció:</label><br>
                <textarea class="form-control border-secondary" name="Descripcio" id="descripcio" rows="2"></textarea><br>
                <button type="submit" class="btn btn-success"name="registrar">Registrar</button>
            </fieldset>
        </form>
    </div>
</main>
  <div class="mt-auto mb-5 px-2">
        <a href="index.php" class="btn btn-danger"name="tornar">
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