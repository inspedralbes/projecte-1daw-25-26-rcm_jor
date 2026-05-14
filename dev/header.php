<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina de gestió d'incidencies</title>
    <link rel="stylesheet" src="dev/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/slate/bootstrap.min.css">
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        main {
            flex: 1;
        }
    </style>
</head>
<header>
    <div class="container-fluid bg-black bg-gradient text-white p-2 shadow text-center">
        <div class="row align-items-center">

            <div class="col-md-7">
                <h1 class="display-5 fw-bold mb-2"><?php echo $titulo ?? "Gestió"; ?></h1>
            </div>
            <div class="col-md-3 d-flex">
                <form action="consultar.php" method="POST">
                    <input class="mb-3" style="width: 180px;" placeholder="Consultar incidencia:" name="id" id="id" type="number">
                    <button type="submit" class="btn btn-outline-success"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                        </svg></button>
                </form>
            </div>
            <div class="col-md-2">
                <a href="index.php" class="badge bg-secondary px-3 py-2 shadow bg-gradient"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z" />
                    </svg></a>
            </div>
        </div>
    </div>
    </div>
</header>

<body class="bg-dark d-flex flex-column min-vh-100">