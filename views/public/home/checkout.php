<?php
require_once __DIR__ . "/../../../app/controllers/CheckoutController.php";

if (isset($_SESSION['cart'])) {
    $checkout = new CheckoutController();

    $invoice_id = uniqid("101skill-invoice");
    $checkout->checkout($invoice_id);
}
