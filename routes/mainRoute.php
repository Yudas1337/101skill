<?php

class mainRoute
{
    /**
     * Manage dashboard route
     *
     * @return void
     */

    public static function manageRoute(string $content): void
    {

        switch ($content) {
            case "home":
                require_once __DIR__ . Router::$public . "index.php";
                break;
            case "course":
                require_once __DIR__ . Router::$public . "course.php";
                break;
            case "detail":
                require_once __DIR__ . Router::$public . "detail.php";
                break;
            case "about":
                require_once __DIR__ . Router::$public . "about.php";
                break;
            case "cart":
                require_once __DIR__ . Router::$public . "cart.php";
                break;
            case "checkout":
                sessionMiddleware::shouldLogin();
                sessionMiddleware::cartEmpty();
                require_once __DIR__ . Router::$public . "checkout.php";
                break;
            case "finalCheckout":
                sessionMiddleware::shouldLogin();
                sessionMiddleware::cartEmpty();
                require_once __DIR__ . Router::$public . "finalCheckout.php";
                break;
            default:
                require_once __DIR__ . Router::$errors . "404.php";
        }
    }
}
