<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina de gestió d'incidencies</title>
    <link rel="shortcut icon" href="https://yt3.googleusercontent.com/ytc/AIdro_naJn4yB-hxCkY_B19E9Zm9iK2IjHONU__Zn9_nLryjtg=s900-c-k-c0x00ffffff-no-rj" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/litera/bootstrap.min.css">
    <link rel="stylesheet" href="dev/style.css">

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

<body class="d-flex flex-column min-vh-100">
    <header class="mb-5">
        <div class="container-fluid bg-primary bg-gradient text-white shadow mt-1 text-center py-2">
            <div class="row align-items-center">
                <div class="col-md-2">
                    <a href="index.php" class="btn btn-light shadow-sm" name="inici">
                        <img style="width: 40px;height: 40px;" class="rounded" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqLkJHRViAxNXrAhTBbp7NwDejHyfRus7poQ&s" alt="">
                    </a>
                </div>
                <div class="col-md-7">
                    <h1 class="display-5 fw-bold mb-0 fs-3"><?php echo $titulo ?? "Gestió"; ?></h1>
                </div>
                <div class="col-md-3 d-flex justify-content-center">
                    <form action="consultar.php" method="POST" class="d-flex gap-2">
                        <input class="form-control form-control-sm" style="width: 180px;" placeholder="Consultar incidencia:" name="id" id="id" type="number">
                        <button type="submit" class="btn btn-success btn-sm" name="consultar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>