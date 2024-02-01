<?php

require_once __DIR__ . '/partials/header.php';
require_once __DIR__ . '/partials/navbar.php';
?>

<main class="flex-grow-1 bg-dark h-100 d-flex align-items-center justify-content-center hero-image">
    <div class="container">
        <div class="text-center hero-titles">
            <h1 class="text-light display-4">Hotel <span class="logo">Foca</span></h1>
            <a href="/reservas" class="lead text-decoration-none">
                <button class="btn main-btn">Reservar</button>
            </a>
        </div>
    </div>
</main>

<?php
require_once __DIR__ . '/partials/footer.php';
?>