<?php
require_once __DIR__ . "/../../../../app/controllers/CategoryController.php";
require_once __DIR__ . "/../../../layouts/dashboard/sidebar.php";
require_once __DIR__ . "/../../../layouts/dashboard/footer.php";

if (isset($_GET['id'])) {
    $id = abs($_GET['id']);
    $category = new CategoryController();
    $category->delete($id);
}
