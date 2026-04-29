<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title><?php echo $titulo; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <?php include_once "header.php"; ?>
    <main>
        <div class="card w-75 mb-3">
            <div class="card-body">
                <h5 class="card-title">Profesor</h5>
                <p class="card-text">Escull usuari</p>
                <a href="#" class="btn btn-primary">Accedeix</a>
            </div>
        </div>

        <div class="card w-50">
            <div class="card-body">
                <h5 class="card-title">Tècnic</h5>
                <p class="card-text">Escull usuari</p>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Accedeix
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="estat.php">Juan</a></li>
                        <li><a class="dropdown-item" href="estat.php">Maria</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php include_once "footer.php"; ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>