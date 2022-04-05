<?php
require_once __DIR__ . "/../configs/Config.php";
require_once __DIR__ . "/../app/helpers/formHelper.php";
require_once __DIR__ . "/../app/controllers/ClassroomController.php";

class CheckoutModel extends Config
{
    private $formHelper, $classroomController;
    private $redirect;

    function __construct()
    {
        parent::__construct();
        $this->formHelper = new formHelper();
        $this->classroomController = new ClassroomController();
        $this->redirect = "index.php?page=dashboard&content=myclass";
    }

    /**
     * checkout current session.
     * 
     * @param string $invoice_id
     * @return void
     */

    public function checkout(string $invoice_id): void
    {
        $invoice_id     = $this->formHelper->sanitizeInput($invoice_id);
        $user_id        = $_SESSION['user_id'];

        foreach ($_SESSION['cart'] as $cart) {
            $data           = $this->classroomController->getById($cart['id']);
            $classrooms_id  = $data['id'];
            $name           = $data['title'];
            $check          = $this->db->query("SELECT * FROM user_classrooms WHERE classrooms_id = '$classrooms_id' AND user_id = '$user_id'")->num_rows;
            if ($check > 0) {
                alertHelper::failedActions("Kelas $name sudah diklaim");
            }
        }

        $this->db->query("INSERT INTO orders VALUES ('$invoice_id', '$user_id', NOW(),NOW())");

        foreach ($_SESSION['cart'] as $cart) {
            $data           = $this->classroomController->getById($cart['id']);
            $classrooms_id  = $data['id'];
            $this->db->query("INSERT INTO order_details VALUES(NULL, '$invoice_id', '$classrooms_id', NOW(), NOW())");
            $this->db->query("INSERT INTO user_classrooms VALUES(NULL, '$classrooms_id', '$user_id', NOW(), NOW())");
        }

        unset($_SESSION['cart']);
        alertHelper::successAndRedirect("Berhasil klaim kelas", $this->redirect);
    }
}
