<?php

class sessionMiddleware
{
    /**
     * Manage session should admin
     *
     * @return void
     */

    public static function adminSession(): void
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] != "admin") {
            header('location: index.php?page=403');
            die;
        }
    }

    /**
     * Manage session should public / guest user
     *
     * @return void
     */

    public static function publicSession(): void
    {
        if (!isset($_SESSION['role']) && $_SESSION['role'] != "public") {
            header('location: index.php?page=403');
            die;
        }
    }

    /**
     * Manage if user is not logged in, then redirect to forbidden
     *
     * @return void
     */

    public static function isNotLoggedIn(): void
    {
        if (!isset($_SESSION['user_id'])) {
            header('location: index.php?page=403');
        }
    }


    /**
     * Manage if user is already logged in, then redirect to dashboard
     *
     * @return void
     */

    public static function isLoggedIn(): void
    {
        if (isset($_SESSION['user_id'])) {
            header("location: index.php?page=dashboard");
        }
    }

    /**
     * Manage if user is should logged in, then redirect to login
     *
     * @return void
     */

    public static function shouldLogin(): void
    {
        if (!isset($_SESSION['user_id'])) {
            header("location: index.php?page=login");
        }
    }

    /**
     * Manage if cart is empty
     *
     * @return void
     */

    public static function cartEmpty(): void
    {
        if (!isset($_SESSION['cart'])) {
            header("location: index.php?page=main&content=cart");
        }
    }
}
