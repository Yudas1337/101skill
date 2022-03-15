<?php
require_once __DIR__ . "/../../../app/middleware/sessionMiddleware.php";
require_once __DIR__ . "/../../../app/controllers/UserController.php";
sessionMiddleware::isNotLoggedIn();
UserController::logout();
