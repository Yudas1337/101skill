<?php
require_once __DIR__ . "/../configs/Config.php";
require_once __DIR__ . "/../app/helpers/formHelper.php";

class InvoiceModel extends Config
{
    /**
     * Get all invoice
     * 
     * @return array
     */

    public function getAllInvoice(): array
    {
        $arr = array();

        $sql = $this->db->query("SELECT * FROM orders o JOIN user u ON o.user_id = u.id ORDER BY o.created_at DESC");
        while ($data = $sql->fetch_object()) {
            $arr[] = $data;
        }

        return $arr;
    }

    /**
     * Get invoice by user id
     * 
     * @param int $idUser
     * @return array
     */

    public function getInvoice(int $idUser): array
    {
        $arr = array();

        $sql = $this->db->query("SELECT * FROM orders WHERE user_id = '$idUser' ORDER BY created_at DESC");
        while ($data = $sql->fetch_object()) {
            $arr[] = $data;
        }

        return $arr;
    }

    /**
     * Get invoice by invoice id
     * 
     * @param string $idInvoice
     * @return object
     */

    public function getById(string $idInvoice): object
    {
        $sql = $this->db->query("SELECT * FROM orders WHERE invoice_id = '$idInvoice'")->fetch_object();

        return $sql;
    }

    /**
     * Get detail order
     * 
     * @param string $idInvoice
     * @return array
     */

    public function getDetailOrder(string $idInvoice): array
    {
        $arr = array();

        $sql = $this->db->query("SELECT * FROM order_details od JOIN classrooms c ON od.classrooms_id = c.id  WHERE od.invoice_id = '$idInvoice'");
        while ($data = $sql->fetch_object()) {
            $arr[] = $data;
        }

        return $arr;
    }
}
