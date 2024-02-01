<?php require_once __DIR__ . '/../../controllers/user/AuthController.php';

$usuarioLogueado = AuthController::usuarioLogueado();

?>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand logo" href="/">foca</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/habitaciones">Habitaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/reservas">Reservas</a>
                    </li>
                    <?php if ($usuarioLogueado) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">Salir</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Iniciar sesión</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/registro">Registrate</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
</header>