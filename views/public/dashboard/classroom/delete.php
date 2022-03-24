<?php
require_once __DIR__ . "/../../../layouts/dashboard/sidebar.php";
require_once __DIR__ . "/../../../layouts/dashboard/footer.php";
require_once __DIR__ . "/../../../../app/controllers/ClassroomController.php";

if (isset($_GET['id'])) {
    $id = abs($_GET['id']);
    $product = new ClassroomController();
    $product->delete($id);
}
