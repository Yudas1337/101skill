<?php
session_start();

/*
|--------------------------------------------------------------------------
| Register the autoload Routing
|--------------------------------------------------------------------------
|
| autoload routing from file route.php
| Developed By : Yudas Malabi
|
*/


require_once __DIR__ . "/routes/router.php";

new Router();
