<?php

require_once __DIR__ . '/../partials/header.php';
require_once __DIR__ . '/../partials/navbar.php';

?>

<main>
    <div class="container py-3">
        <h3 class="text-center">Reservá tu habitación</h3>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if ($mensajeAlUsuario != '') { ?>
                    <h5 class="text-center py-2 mje-usuario"><?= $mensajeAlUsuario ?></h5>
                <?php } ?>
                <?php if ($mensajeFormulario != '') { ?>
                    <h5 class="text-center py-2 mje-usuario"><?= $mensajeFormulario ?></h5>
                <?php } ?>

                <form action="/crear-reserva" method="POST" class="py-3 w-60vw">
                    <div class="mb-3">
                        <label for="habitacion" class="form-label">Habitacion</label>
                        <select class="form-select" aria-label="habitacion" name="habitacion" required>
                            <option selected>Tipo de habitacion</option>
                            <option value="1">Suite</option>
                            <option value="4">Familiar</option>
                            <option value="5">Doble</option>
                            <option value="7">Individual</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="desde" class="form-label">Desde</label>
                        <input type="date" class="form-control" id="desde" name="desde" required>
                    </div>
                    <div class="mb-3">
                        <label for="hasta" class="form-label">Hasta</label>
                        <input type="date" class="form-control" id="hasta" name="hasta" required>
                    </div>
                    <button class="btn main-btn" type="submit">Reservar</button>
                    <a href="/reservas" class="btn second-btn">
                        Cancelar
                    </a>
                </form>
            </div>
        </div>
    </div>
</main>

<?php
require_once __DIR__ . '/../partials/footer.php';
?>