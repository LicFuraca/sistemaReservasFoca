<?php
require __DIR__ . '/../partials/header.php';
require __DIR__ . '/../partials/navbar.php';
?>

<main class="container mt-5">
    <div class="row">
        <div class="col-md-6 col-lg-7 mx-auto">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title text-center mb-4">Iniciar Sesión</h5>
                    <form action="/login" method="POST" class="mb-2">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su email">
                        </div>
                        <div class="mb-3">
                            <label for="pass" class="form-label">Contraseña:</label>
                            <input type="password" class="form-control" name="pass" id="pass" placeholder="Ingrese su contraseña">
                        </div>
                        <button type="submit" class="btn main-btn">Iniciar Sesión</button>
                    </form>
                    <?php if (isset($mensajeLogin)) { ?>
                        <span class="font-sm mje-usuario"><?= $mensajeLogin ?></span>
                    <?php } ?>
                    <?php if (isset($mensajeFormulario)) { ?>
                        <span class="font-sm mje-usuario"><?= $mensajeFormulario ?></span>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
require __DIR__ . '/../partials/footer.php';
?>