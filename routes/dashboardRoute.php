<?php
require_once __DIR__ . "/classroomRoute.php";
require_once __DIR__ . "/categoryRoute.php";
require_once __DIR__ . "/customerRoute.php";
require_once __DIR__ . "/benefitRoute.php";


class dashboardRoute
{
    /**
     * Manage dashboard route
     *
     * @return void
     */

    public static function manageRoute(string $content): void
    {
        sessionMiddleware::isNotLoggedIn();
        switch ($content) {
            case "main":
                require_once __DIR__ . Router::$loggedIn . "index.php";
                break;
            case "classroom":
                (isset($_GET['menu']) ? classroomRoute::manageRoute($_GET['menu']) : dashboardRoute::manageRoute("main"));
                break;
            case "category":
                (isset($_GET['menu']) ? categoryRoute::manageRoute($_GET['menu']) : dashboardRoute::manageRoute("main"));
                break;
            case "customer":
                (isset($_GET['menu']) ? customerRoute::manageRoute($_GET['menu']) : dashboardRoute::manageRoute("main"));
                break;
            case "benefit":
                (isset($_GET['menu']) ? benefitRoute::manageRoute($_GET['menu']) : dashboardRoute::manageRoute("main"));
                break;
            case "profile":
                require_once __DIR__ . Router::$loggedIn . "profile.php";
                break;
            case "changePass":
                require_once __DIR__ . Router::$loggedIn . "changePassword.php";
                break;
            case "logout":
                require_once __DIR__ . Router::$loggedIn . "logout.php";
                break;
            default:
                require_once __DIR__ . Router::$errors . "404.php";
        }
    }
}
