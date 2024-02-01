<?php

require_once __DIR__ . '/AuthController.php';


AuthController::cerrarSesion();
header('Location: /login');
