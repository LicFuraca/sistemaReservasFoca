<?php
require __DIR__ . '/../partials/header.php';
require __DIR__ . '/../partials/navbar.php';
?>

<main class="container mt-5">
    <div class="row">
        <div class="col-md-6 col-lg-7 mx-auto">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title text-center mb-4">Registrate</h5>
                    <form action="/registro" method="POST" class="mb-2">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su email">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Nombre Completo:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre completo">
                        </div>
                        <div class="mb-3">
                            <label for="pass" class="form-label">Contraseña:</label>
                            <input type="password" class="form-control" name="pass" id="pass" placeholder="Ingrese su contraseña">
                        </div>
                        <button type="submit" class="btn main-btn">Registrate</button>
                    </form>
                    <?php if (isset($mjeRegistro)) { ?>
                        <span class="font-sm mje-usuario"><?= $mjeRegistro ?></span>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
require __DIR__ . '/../partials/footer.php';
?>