<?php
require_once __DIR__ . "/Controller.php";
require_once __DIR__ . "/../../models/InvoiceModel.php";

class InvoiceController
{
    private $invoiceModel;

    function __construct()
    {
        $this->invoiceModel = new InvoiceModel();
    }

    /**
     * Get all invoice
     * 
     * @return array
     */

    public function getAllInvoice(): array
    {
        return $this->invoiceModel->getAllInvoice();
    }

    /**
     * Get Invoice
     * @return array
     */

    public function getInvoice(): array
    {
        $idUser = $_SESSION['user_id'];
        return $this->invoiceModel->getInvoice($idUser);
    }

    /**
     * Get By Id
     * 
     * @param string $idInvoice
     * @return object
     */

    public function getById(string $idInvoice): object
    {
        return $this->invoiceModel->getById($idInvoice);
    }

    /**
     * Get Detail Order
     * 
     * @param string $idInvoice
     * @return array
     */

    public function getDetailOrder(string $idInvoice): array
    {
        return $this->invoiceModel->getDetailOrder($idInvoice);
    }
}
