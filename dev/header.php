<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sistema de gestión de incidencias del Grup 4. DAW Pedralbes.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Pagina de gestió d'incidencies</title>
    
    <link rel="shortcut icon" href="#" type="image/x-icon">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/litera/bootstrap.min.css">
    
    <link rel="stylesheet" href="dev/style.css">

    

<head>
    <style>
        @media (max-width: 600px) {
            .btn-sm {
                width: 100%;
            }
        }

        html, body { height: 100%; margin: 0; padding: 0; overflow-x: hidden; }
        main { flex: 1; }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    <header class="mb-5">
        <div class="container-fluid bg-primary bg-gradient text-white shadow mt-1 text-center py-2">
            <div class="row align-items-center">
                <div class="col-md-2">
                    <a href="index.php" class="btn btn-light shadow-sm" aria-label="Volver al inicio">
                        <img style="width: 40px; height: 40px;" class="rounded" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqLkJHRViAxNXrAhTBbp7NwDejHyfRus7poQ&s" alt="Logo de la aplicación">
                    </a>
                </div>
                <div class="col-md-7">
                    <h1 class="display-5 fw-bold mb-0 fs-3"><?php echo $titulo ?? "Gestió"; ?></h1>
                </div>
                <div class="col-md-3 d-flex justify-content-center">
                    <form action="consultar.php" method="POST" class="d-flex gap-2">
                        <input class="form-control form-control-sm" aria-label="ID de incidencia" style="width: 180px;" placeholder="Consultar incidencia:" name="id" id="id_consulta" type="number">
                        
                        <button type="submit" class="btn btn-success btn-sm" name="consultar" aria-label="Buscar incidencia">
                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" width="12" height="12" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>
