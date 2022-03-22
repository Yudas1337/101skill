<?php
class classroomRoute
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
                require_once __DIR__ . Router::$loggedIn . "classroom/list.php";
                break;
            case "add":
                require_once __DIR__ . Router::$loggedIn . "classroom/add.php";
                break;
            case "detail":
                require_once __DIR__ . Router::$loggedIn . "classroom/detail.php";
                break;
            case "edit":
                require_once __DIR__ . Router::$loggedIn . "classroom/edit.php";
                break;
            case "delete":
                require_once __DIR__ . Router::$loggedIn . "classroom/delete.php";
                break;
            default:
                require_once __DIR__ . Router::$errors . "404.php";
        }
    }
}
