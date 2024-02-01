<?php

require_once __DIR__ . '/../partials/header.php';
require_once __DIR__ . '/../partials/navbar.php';

?>

<main class="py-3">
    <div class="container">
        <h3 class="text-center py-3">Nuestras habitaciones</h1>
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <?php foreach ($habitaciones as $habitacion) { ?>
                    <div class="col">
                        <div class="card">
                            <img src="<?= htmlspecialchars($habitacion['imagen']) ?>" class="card-img-top" alt="Fotos de la habitacion">
                            <div class="card-body">
                                <h5 class="card-title">Habitación <?= htmlspecialchars($habitacion['categoria']); ?></h5>
                                <p class="card-text">
                                    <?= htmlspecialchars($habitacion['descripcion']) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
    </div>
</main>

<?php
require_once __DIR__ . '/../partials/footer.php';
?>