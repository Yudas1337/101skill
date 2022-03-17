<?php
require_once __DIR__ . "/../configs/Config.php";
require_once __DIR__ . "/../app/interfaces/ModelInterface.php";
require_once __DIR__ . "/../app/helpers/formHelper.php";
require_once __DIR__ . "/../app/helpers/fileHelper.php";

class ClassroomModel extends Config implements ModelInterface
{
    private $formHelper;
    private $upload_path = "assets/images/classroom_thumbnails/";

    function __construct()
    {
        parent::__construct();
        $this->formHelper = new formHelper();
    }

    /**
     * Get all classroom .
     * 
     * @return array
     */

    public function getAll(): array
    {
        $arr = array();

        $sql = $this->db->query("SELECT * FROM classrooms");
        while ($data = $sql->fetch_object()) {
            $arr[] = $data;
        }

        return $arr;
    }

    /**
     * insert classroom into the table.
     * 
     * @return void
     */

    public function save(): void
    {
        $title          = $this->formHelper->sanitizeInput($_POST['title']);
        $category_id    = $this->formHelper->sanitizeInput($_POST['category_id']);
        $description    = $this->formHelper->sanitizeInput($_POST['description']);
        $is_visible     = $this->formHelper->sanitizeInput($_POST['is_visible']);
        $slug           = str_replace(" ", "-", $title);
        $created_by     = $_SESSION['user_id'];

        $thumbnail = $_FILES['thumbnail'];
        $thumbnail = fileHelper::_doUpload($this->upload_path, $thumbnail);

        $this->db->query("INSERT INTO classrooms VALUES (NULL, '$category_id', '$title', '$thumbnail', '$description','$is_visible', '$slug', '$created_by', NOW(), NOW())");
    }

    /**
     * update specified classroom by id .
     * 
     * @param int $id
     * @return void
     */

    public function update(int $id): void
    {
        $product_id     = $this->formHelper->sanitizeInput($_POST['product_id']);
        $category_id    = $this->formHelper->sanitizeInput($_POST['category_id']);
        $supplier_id    = $this->formHelper->sanitizeInput($_POST['supplier_id']);
        $name           = $this->formHelper->sanitizeInput($_POST['name']);
        $merk           = $this->formHelper->sanitizeInput($_POST['merk']);
        $description    = $this->formHelper->sanitizeInput($_POST['description']);
        $price          = $this->formHelper->sanitizeInput($_POST['price']);
        $stock          = $this->formHelper->sanitizeInput($_POST['stock']);


        $sql = $this->db->query("SELECT * FROM product WHERE id = '$id'");
        $fetch = $sql->fetch_object();
        $countRows = $sql->num_rows;

        $thumbnail = $fetch->thumbnail;

        if ($countRows > 0) {
            if (!empty($_FILES['thumbnail']['name'])) {
                fileHelper::_removeImage($this->upload_path, $thumbnail);
                $thumbnail = $_FILES['thumbnail'];
                $thumbnail = fileHelper::_doUpload($this->upload_path, $thumbnail);
            }

            $this->db->query("UPDATE product SET product_id = '$product_id', category_id ='$category_id', supplier_id = '$supplier_id', name = '$name', merk = '$merk', description = '$description', thumbnail = '$thumbnail', price = '$price', stock = '$stock' WHERE id = '$id'");
        } else {
            alertHelper::failedActions("data tidak ditemukan");
        }
    }

    /**
     * delete specified classroom by id.
     * 
     * @param int $id
     * @return void
     */

    public function delete(int $id): void
    {
        $sql = $this->db->query("SELECT * FROM product WHERE id = '$id'")->fetch_object();
        fileHelper::_removeImage($this->upload_path, $sql->thumbnail);
        $this->db->query("DELETE FROM product WHERE id = '$id'");
    }

    /**
     * get specified classroom by id.
     * 
     * @param int $id
     * @return array
     */

    public function getById(int $id): array
    {
        $arr = array();
        $sql = $this->db->query("SELECT * FROM product WHERE id = '$id'")->fetch_object();
        $arr['id']              = $sql->id;
        $arr['product_id']      = $sql->product_id;
        $arr['category_id']     = $sql->category_id;
        $arr['supplier_id']     = $sql->supplier_id;
        $arr['name']            = $sql->name;
        $arr['merk']            = $sql->merk;
        $arr['description']     = $sql->description;
        $arr['thumbnail']       = $sql->thumbnail;
        $arr['price']           = $sql->price;
        $arr['stock']           = $sql->stock;

        return $arr;
    }

    /**
     * count all classroom
     * 
     * @return int
     */

    public function countRows(): int
    {
        return $this->db->query("SELECT * FROM product")->num_rows;
    }

    /**
     * get latest classroom
     * 
     * @return array
     */

    public function getLatestClassroom(): array
    {
        $arr = array();

        $sql = $this->db->query("SELECT * FROM product ORDER BY id DESC LIMIT 9");
        while ($data = $sql->fetch_object()) {
            $arr[] = $data;
        }

        return $arr;
    }

    /**
     * get favorite classroom
     * 
     * @return array
     */

    public function getFavoriteClassroom(): array
    {
        $arr = array();

        $sql = $this->db->query("SELECT DISTINCT od.product_id, p.*, SUM(od.qty) AS favorit FROM order_details od JOIN product p ON od.product_id = p.id GROUP BY p.id ORDER BY favorit DESC LIMIT 9");
        while ($data = $sql->fetch_object()) {
            $arr[] = $data;
        }

        return $arr;
    }
}
