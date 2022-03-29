<?php

require_once __DIR__ . "/../../models/CartModel.php";

class CartController
{
    private $cartModel;
    private $redirect = "index.php?page=main&content=cart";

    function __construct()
    {
        $this->cartModel = new CartModel();
    }

    /**
     * add items to cart .
     * @return void
     */

    public function add(int $id): void
    {
        $id = intval($id);
        if (isset($_SESSION['cart'][$id])) {
            alertHelper::failedActions("Kelas sudah ada di keranjang");
        } else {
            $this->cartModel->add($id);
            alertHelper::successAndRedirect("Berhasil tambah Kelas ke keranjang", $this->redirect);
        }
    }

    /**
     * update cart .
     * @return void
     */

    public function update(int $id): void
    {
        $id = intval(abs($id));
        $this->cartModel->update($id);
        alertHelper::successAndRedirect("Berhasil update keranjang", $this->redirect);
    }

    /**
     * delete items in cart .
     * @return void
     */

    public function delete(int $id): void
    {
        $id = intval(abs($id));
        $this->cartModel->delete($id);
        alertHelper::successAndRedirect("Berhasil hapus kelas dari keranjang", $this->redirect);
    }

    /**
     * destroy cart .
     * @return void
     */

    public function destroy(): void
    {
        $this->cartModel->destroy();
        alertHelper::successAndRedirect("Berhasil kosongkan keranjang", $this->redirect);
    }
}
