<?php
require_once __DIR__ . "/../../../../app/controllers/ModuleController.php";

if (isset($_GET['id'])) {
    $id = abs($_GET['id']);
    $product = new ModuleController();
    $product->delete($id);
}
