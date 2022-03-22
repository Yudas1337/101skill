<?php
require_once __DIR__ . "/../../../../app/controllers/ClassroomController.php";

if (isset($_GET['id'])) {
    $id = abs($_GET['id']);
    $product = new ClassroomController();
    $product->delete($id);
}
