<?php $titulo = "Pagina d'incidències"; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title><?php echo $titulo; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <header>
        <div class="bg-dark text-white p-5 mb-5 shadow-lg">
        <div class="d-flex justify-content-center fs-1">Pagina de gestió d'incidències</div>
        <div class="d-flex justify-content-center fs-5">GRUP4: Ramses i Jordi</div>
    </div>
    </header>
    <main>
        <div class="container text-center">
            <div class="row">
                
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="https://static.vecteezy.com/system/resources/thumbnails/059/153/869/small/3d-rendered-blue-icon-with-a-white-user-symbol-representing-modern-digital-identity-and-communication-on-transparent-background-png.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">USUARI</h5>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Accedir
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="https://img.freepik.com/fotos-premium/engranajes-3d-estilo-estilizado-sobre-fondo-blanco_1055732-9836.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">TECNIC</h5>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Accedir
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="https://img.freepik.com/free-vector/blue-folder-with-information-about-employee-3d-illustration-cartoon-drawing-folder-with-files-documents-3d-style-white-background-business-recruitment-management-organization-concept_778687-707.jpg?semt=ais_hybrid&w=740&q=80" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">ADMINISTRADOR</h5>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Accedir
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
