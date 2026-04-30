
        <?php include("header.php"); ?>
    </header>
    <main>
        <div class="d-flex justify-content-center">
            <h1>REGISTRAR INCIDENCIA</h1>
            <fieldset class="d-flex justiry-content-center border border-secondary rounded-2 p-5">
                <form action="http://daw.inspedralbes.cat/form/action.php" method="post">
                    <label for="departament">Departament:</label> <br>
                    <input class="mb-3 form-control" style="width: 400px;" name="Departament" id="departament" type="text"> <br>
                    <label for="data">Data:</label> <br>
                    <input class="mb-3 form-control" name="Data" id="data" type="date"><br>
                    <label for="descripcio">Descripció:</label><br>
                    <textarea class="mb-3 form-control" name="Descripció" id="descripcio" rows="10"></textarea><br>
                    <button href="index.php" type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </fieldset>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>