<?php
require_once __DIR__ . "/categoryRoute.php";

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
            case "product":
                (isset($_GET['menu']) ? productRoute::manageRoute($_GET['menu']) : dashboardRoute::manageRoute("main"));
                break;
            case "order":
                (isset($_GET['menu']) ? orderRoute::manageRoute($_GET['menu']) : dashboardRoute::manageRoute("main"));
                break;
            case "category":
                (isset($_GET['menu']) ? categoryRoute::manageRoute($_GET['menu']) : dashboardRoute::manageRoute("main"));
                break;
            case "customer":
                (isset($_GET['menu']) ? customerRoute::manageRoute($_GET['menu']) : dashboardRoute::manageRoute("main"));
                break;
            case "invoice":
                (isset($_GET['menu']) ? invoiceRoute::manageRoute($_GET['menu']) : dashboardRoute::manageRoute("main"));
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
