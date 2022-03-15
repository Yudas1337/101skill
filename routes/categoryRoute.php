<?php
class categoryRoute
{

    /**
     * Manage category menu's route
     *
     * @param string $content
     * @return void
     */

    public static function manageRoute(string $content): void
    {
        sessionMiddleware::adminSession();
        switch ($content) {
            case "list":
                require_once __DIR__ . Router::$loggedIn . "category/list.php";
                break;
            case "add":
                require_once __DIR__ . Router::$loggedIn . "category/add.php";
                break;
            case "edit":
                require_once __DIR__ . Router::$loggedIn . "category/edit.php";
                break;
            case "delete":
                require_once __DIR__ . Router::$loggedIn . "category/delete.php";
                break;
            default:
                require_once __DIR__ . Router::$errors . "404.php";
        }
    }
}
