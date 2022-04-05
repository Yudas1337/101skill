<?php
class myhistoryRoute
{

    /**
     * Manage history menu's route
     *
     * @param string $content
     * @return void
     */

    public static function manageRoute(string $content): void
    {
        sessionMiddleware::publicSession();
        switch ($content) {
            case "list":
                require_once __DIR__ . Router::$loggedIn . "myhistory/list.php";
                break;
            case "detail":
                require_once __DIR__ . Router::$loggedIn . "myhistory/detail.php";
                break;
            default:
                require_once __DIR__ . Router::$errors . "404.php";
        }
    }
}
