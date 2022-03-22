<?php
class moduleRoute
{

    /**
     * Manage module menu's route
     *
     * @param string $content
     * @return void
     */

    public static function manageRoute(string $content): void
    {
        sessionMiddleware::adminSession();
        switch ($content) {
            case "add":
                require_once __DIR__ . Router::$loggedIn . "module/add.php";
                break;
            case "edit":
                require_once __DIR__ . Router::$loggedIn . "module/edit.php";
                break;
            case "delete":
                require_once __DIR__ . Router::$loggedIn . "module/delete.php";
                break;
            default:
                require_once __DIR__ . Router::$errors . "404.php";
        }
    }
}
