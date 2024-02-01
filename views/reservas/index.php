<?php

require_once __DIR__ . '/../partials/header.php';
require_once __DIR__ . '/../partials/navbar.php';
?>

<main>
    <div class="container py-3">
        <h3 class="text-center">Tus Reservas</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Habitación</th>
                    <th scope="col">Fecha Check-in</th>
                    <th scope="col">Fecha Check-out</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($reservas)) { ?>
                    <tr class="lead text-center">
                        No tiene reservas vigentes.
                    </tr>
                    <?php } else {
                    foreach ($reservas as $reserva) { ?>
                        <tr>
                            <td><?= $reserva->nombreHabitacion ?></td>
                            <td><?= $reserva->desde ?></td>
                            <td><?= $reserva->hasta ?></td>
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>
        <div class="actions text-end mt-5">
            <a href="/crear-reserva" class="btn main-btn">Nueva reserva</a>
        </div>
        <div class="info mt-5">
            <span class="d-block">Horario de check-in: 10am</span>
            <span class="d-block">Horario de check-out: 12 am</span>
        </div>
</main>

<?php
require_once __DIR__ . '/../partials/footer.php';
?>