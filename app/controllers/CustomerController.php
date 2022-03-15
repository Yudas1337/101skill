<?php
require_once __DIR__ . "/../../models/CustomerModel.php";

class CustomerController
{
    private $customerModel;

    function __construct()
    {
        $this->customerModel = new CustomerModel();
    }

    /**
     * Get All customer .
     * 
     * @return array
     */

    public function getAll(): array
    {
        return $this->customerModel->show();
    }
}
