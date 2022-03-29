<?php
require_once __DIR__ . "/../configs/Config.php";
require_once __DIR__ . "/../app/interfaces/FormInterface.php";

class CartModel extends Config implements FormInterface
{

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Count total cart items .
     * @return void
     */

    private function countRows(): int
    {
        return count($_SESSION['cart']);
    }

    /**
     * add items to cart .
     * @return void
     */

    public function add(int $id): void
    {
        $this->filterForm();

        $sql            = $this->db->query("SELECT * FROM classrooms WHERE id = '$id'");
        $fetch          = $sql->fetch_object();
        $countRows      = $sql->num_rows;

        if ($countRows > 0) {
            $item_data = array(
                'id' => $fetch->id
            );
            $_SESSION['cart'][$fetch->id] = $item_data;
        } else {
            alertHelper::failedActions("Kelas tidak valid");
        }
    }

    /**
     * delete items in cart
     * @return void
     */

    public function delete(int $id): void
    {
        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
        } else {
            alertHelper::failedActions("Kelas tidak valid atau belum ada di keranjang");
        }

        if ($this->countRows() == 0) {
            unset($_SESSION['cart']);
        }
    }

    /**
     * update cart qty from $id
     * @return void
     */

    public function update(int $id): void
    {
        $this->filterForm();

        $sql        = $this->db->query("SELECT * FROM classrooms WHERE id = '$id'");
        $fetch      = $sql->fetch_object();
        $countRows  = $sql->num_rows;

        if ($countRows > 0) {
            $item_data = array(
                'id' => $fetch->id
            );
            $_SESSION['cart'][$fetch->id] = $item_data;
        } else {
            alertHelper::failedActions("Kelas tidak valid");
        }
    }

    /**
     * destroy cart sessions
     * @return void
     */

    public function destroy(): void
    {
        unset($_SESSION['cart']);
    }

    /**
     * form validation for qty
     * @return void
     */
    public function filterForm(): void
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
            alertHelper::failedActions("Admin tidak bisa berbelanja");
        }
    }
}
