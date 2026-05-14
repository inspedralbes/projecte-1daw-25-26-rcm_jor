<?php include_once "header.php"; ?>

<header>
    <div class="container-fluid bg-black bg-gradient text-white p-2 shadow text-center">
        <div class="row align-items-center">
            <div class="col-md-2"></div>
            <div class="col-md-8">
<h1 class="display-6 display-md-5 fw-bold mb-2">Gestió de les teves incidències</h1>            </div>
            <div class="col-md-2">
                <a href="index.php" class="badge bg-secondary px-3 py-2 shadow bg-gradient"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
  <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
</svg></a>
            </div>
        </div>
    </div>
</header>

<main class="container px-4 d-flex pb-5 flex-column justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="row justify-content-center g-4 w-100">

<!-- PROFESOR -->
        <div class="col-12 col-md-4 col-xl-3">
            <div class="card h-100 border-0 shadow text-center p-3">
                <div class="card-body d-flex flex-column">
                    <div class="rounded-circle bg-success bg-opacity-10 text-success p-3 mx-auto mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                            <path d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z" />
                        </svg>
                    </div>
                    <h5 class="card-title fw-bold text-white">Professor</h5>
                    <p class="card-text text-muted flex-grow-1 small">Registrar noves incidències.</p>
                    <a href="crear.php" class="btn btn-success fw-bold w-100 mt-3 shadow-sm">Entrar</a>
                </div>
            </div>
        </div>

<!-- TECNIC -->
        <div class="col-12 col-md-4 col-xl-3">
            <div class="card h-100 border-0 shadow text-center p-3">
                <div class="card-body d-flex flex-column">
                    <div class="rounded-circle bg-warning bg-opacity-10 text-warning p-3 mx-auto mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                            <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                        </svg>
                    </div>
                    <h5 class="card-title fw-bold text-white">Tècnic</h5>
                    <p class="card-text text-muted flex-grow-1 small">Gestionar assignacions.</p>
                    <a href="Tecnics.php" class="btn btn-warning text-dark fw-bold w-100 mt-3 shadow-sm">Entrar</a>
                </div>
            </div>
        </div>

<!-- ADMIN -->
        <div class="col-12 col-md-4 col-xl-3">
            <div class="card h-100 border-0 shadow text-center p-3">
                <div class="card-body d-flex flex-column">
                    <div class="rounded-circle bg-info bg-opacity-10 text-info p-3 mx-auto mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-database-fill" viewBox="0 0 16 16">
                            <path d="M3.904 1.777C4.978 1.289 6.427 1 8 1s3.022.289 4.096.777C13.125 2.245 14 2.993 14 4s-.875 1.755-1.904 2.223C11.022 6.711 9.573 7 8 7s-3.022-.289-4.096-.777C2.875 5.755 2 5.007 2 4s.875-1.755 1.904-2.223" />
                            <path d="M2 6.161V7c0 1.007.875 1.755 1.904 2.223C4.978 9.71 6.427 10 8 10s3.022-.289 4.096-.777C13.125 8.755 14 8.007 14 7v-.839c-.457.432-1.004.751-1.49.972C11.278 7.693 9.682 8 8 8s-3.278-.307-4.51-.867c-.486-.22-1.033-.54-1.49-.972" />
                            <path d="M2 9.161V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13s3.022-.289 4.096-.777C13.125 11.755 14 11.007 14 10v-.839c-.457.432-1.004.751-1.49.972-1.232.56-2.828.867-4.51.867s-3.278-.307-4.51-.867c-.486-.22-1.033-.54-1.49-.972" />
                            <path d="M2 12.161V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16s3.022-.289 4.096-.777C13.125 14.755 14 14.007 14 13v-.839c-.457.432-1.004.751-1.49.972-1.232.56-2.828.867-4.51.867s-3.278-.307-4.51-.867c-.486-.22-1.033-.54-1.49-.972" />
                        </svg>
                    </div>
                    <h5 class="card-title fw-bold text-white">Administrador</h5>
                    <p class="card-text text-muted flex-grow-1 small">Control total del sistema.</p>
                    <a href="admin.php" class="btn btn-info fw-bold w-100 mt-3 shadow-sm">Entrar</a>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
    main .btn {
        transition: transform 0.2s ease, shadow 0.2s ease;
    }

    main .btn:hover {
        transform: scale(1.05);
        shadow: 0 .5rem 1rem rgba(0, 0, 0, .15);
    }
</style>

<?php include_once "footer.php"; ?>