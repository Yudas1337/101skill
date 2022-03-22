<?php
require_once __DIR__ . "/../configs/Config.php";
require_once __DIR__ . "/../app/interfaces/ModelInterface.php";
require_once __DIR__ . "/../app/helpers/formHelper.php";
require_once __DIR__ . "/../app/helpers/fileHelper.php";

class BenefitModel extends Config implements ModelInterface
{
    private $formHelper;

    private $redirect = "index.php?page=dashboard&content=classroom&menu=detail&id=";

    function __construct()
    {
        parent::__construct();
        $this->formHelper = new formHelper();
    }

    /**
     * Get all data from the table
     *
     * @return array
     */

    public function getAll(): array
    {
        $arr = array();

        $sql = $this->db->query("SELECT * FROM benefits");
        while ($data = $sql->fetch_object()) {
            $arr[] = $data;
        }

        return $arr;
    }

    /**
     * store new data into the table
     *
     * @return void
     */

    public function save(): void
    {
        $class_id   = $this->formHelper->sanitizeInput($_POST['class_id']);
        $name       = $this->formHelper->sanitizeInput($_POST['name']);

        $this->db->query("INSERT INTO benefits VALUES (NULL, '$name', '$class_id', NOW(), NOW())");
    }

    /**
     * update specified data by id from the table
     *
     * @param int $id
     * @return void
     */

    public function update(int $id): void
    {
        $name       = $this->formHelper->sanitizeInput($_POST['name']);
        $sql        = $this->db->query("SELECT * FROM benefits WHERE id = '$id'")->num_rows;

        if ($sql > 0) {
            $this->db->query("UPDATE benefits SET name = '$name' WHERE id = '$id'");
        } else {
            alertHelper::failedActions("data tidak ditemukan");
        }
    }

    /**
     * delete specified data by id from the table
     *
     * @param int $id
     * @return void
     */

    public function delete(int $id): void
    {
        $class_id   = $this->formHelper->sanitizeInput($_GET['class_id']);
        $query      = $this->db->query("DELETE FROM benefits WHERE id = '$id'");

        $this->redirect .= $class_id;
        if (!$query) {
            alertHelper::failedAndRedirect("Data benefit sedang digunakan", $this->redirect);
        } else {
            alertHelper::successAndRedirect("Berhasil hapus benefit", $this->redirect);
        }
    }

    /**
     * show specified data by id from the table
     *
     * @param int $id
     * @return array
     */

    public function getById(int $id): array
    {
        $arr = array();
        $sql = $this->db->query("SELECT * FROM categories WHERE id = '$id'")->fetch_object();
        $arr['id']   = $sql->id;
        $arr['name'] = $sql->name;
        $arr['icon'] = $sql->icon;

        return $arr;
    }
}
