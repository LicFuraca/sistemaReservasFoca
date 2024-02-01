<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$rutas = [
    '/' => 'controllers/home.php',
    '/habitaciones' => 'controllers/habitaciones/habitaciones.php',
    '/reservas' => 'controllers/reservas/reservas.php',
    '/crear-reserva' => 'controllers/reservas/crearReserva.php',
    '/login' => 'controllers/user/login.php',
    '/registro' => 'controllers/user/registro.php',
    '/logout' => 'controllers/user/logout.php',
];

function routeToController($uri, $rutas) {
    if (array_key_exists($uri, $rutas)) {
        require_once $rutas[$uri];
    } else {
        abort();
    }
}

function abort($statusCode = 404) {
    http_response_code($statusCode);
    require_once "views/{$statusCode}.php";
    die();
}

routeToController($uri, $rutas);
