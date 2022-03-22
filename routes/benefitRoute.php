<?php
class benefitRoute
{

    /**
     * Manage benefit menu's route
     *
     * @param string $content
     * @return void
     */

    public static function manageRoute(string $content): void
    {
        sessionMiddleware::adminSession();
        switch ($content) {
            case "delete":
                require_once __DIR__ . Router::$loggedIn . "benefit/delete.php";
                break;
            default:
                require_once __DIR__ . Router::$errors . "404.php";
        }
    }
}
