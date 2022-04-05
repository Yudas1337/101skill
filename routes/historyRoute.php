<?php
class historyRoute
{

    /**
     * Manage history menu's route
     *
     * @param string $content
     * @return void
     */

    public static function manageRoute(string $content): void
    {
        sessionMiddleware::adminSession();
        switch ($content) {
            case "list":
                require_once __DIR__ . Router::$loggedIn . "history/list.php";
                break;
            case "detail":
                require_once __DIR__ . Router::$loggedIn . "history/detail.php";
                break;
            default:
                require_once __DIR__ . Router::$errors . "404.php";
        }
    }
}
