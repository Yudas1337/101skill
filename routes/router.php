<?php

require_once __DIR__ . "/../app/middleware/sessionMiddleware.php";
require_once __DIR__ . "/dashboardRoute.php";
require_once __DIR__ . "/mainRoute.php";
/**
 * Define site routing method.
 *
 */

class Router
{
    public static $public = "/../views/public/home/";
    public static $auth = "/../views/public/auth/";
    public static $errors = "/../views/errors/";
    public static $loggedIn = "/../views/public/dashboard/";

    function __construct()
    {
        $this->manageRoute();
    }

    /**
     * Manage site global route
     *
     * @return void
     */

    public function manageRoute(): void
    {
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            switch ($page) {
                case "main":
                    (isset($_GET['content']) ? mainRoute::manageRoute($_GET['content']) : mainRoute::manageRoute("main"));
                    break;
                case "login":
                    require_once __DIR__ . self::$auth . "index.php";
                    break;
                case "register":
                    require_once __DIR__ . self::$auth . "register.php";
                    break;
                case "dashboard":
                    (isset($_GET['content']) ? dashboardRoute::manageRoute($_GET['content']) : dashboardRoute::manageRoute("main"));
                    break;
                case "403":
                    require_once __DIR__ . self::$errors . "403.php";
                    break;
                default:
                    require_once __DIR__ . self::$errors . "404.php";
            }
        } else {
            header('location: index.php?page=main&content=home');
        }
    }
}
