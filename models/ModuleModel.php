<?php
require_once __DIR__ . "/../configs/Config.php";
require_once __DIR__ . "/../app/interfaces/ModelInterface.php";
require_once __DIR__ . "/../app/helpers/formHelper.php";
require_once __DIR__ . "/../app/helpers/fileHelper.php";

class ModuleModel extends Config implements ModelInterface
{
    private $formHelper;
    private $upload_path = "assets/images/module_thumbnails/";
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

        $sql = $this->db->query("SELECT * FROM categories");
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
        $class_id       = $this->formHelper->sanitizeInput($_GET['class_id']);
        $title          = $this->formHelper->sanitizeInput($_POST['title']);
        $description    = $this->formHelper->sanitizeInput($_POST['description']);
        $content        = $_POST['content'];
        $slug           =  str_replace(" ", "-", $title);

        $thumbnail = $_FILES['thumbnail'];
        $thumbnail = fileHelper::_doUpload($this->upload_path, $thumbnail);

        $this->db->query("INSERT INTO modules VALUES (NULL, '$class_id', '$title', '$description', '$content', '$thumbnail', '$slug', NOW(), NOW())");
    }

    /**
     * update specified data by id from the table
     *
     * @param int $id
     * @return void
     */

    public function update(int $id): void
    {
        $name = $this->formHelper->sanitizeInput($_POST['name']);

        $sql = $this->db->query("SELECT * FROM categories WHERE id = '$id'");
        $fetch = $sql->fetch_object();
        $countRows = $sql->num_rows;

        $icon = $fetch->icon;

        if ($countRows > 0) {
            if (!empty($_FILES['icon']['name'])) {
                fileHelper::_removeImage($this->upload_path, $icon);
                $icon = $_FILES['icon'];
                $icon = fileHelper::_doUpload($this->upload_path, $icon);
            }

            $this->db->query("UPDATE categories SET name = '$name', icon = '$icon' WHERE id = '$id'");
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
        $sql = $this->db->query("SELECT * FROM categories WHERE id = '$id'")->fetch_object();
        $query = $this->db->query("DELETE FROM categories WHERE id = '$id'");
        if (!$query) {
            alertHelper::failedAndRedirect("Data kategori sedang digunakan", $this->redirect);
        } else {
            fileHelper::_removeImage($this->upload_path, $sql->icon);
            alertHelper::successAndRedirect("Berhasil hapus kategori", $this->redirect);
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
        $sql = $this->db->query("SELECT * FROM modules WHERE classrooms_id = '$id'");

        while ($data = $sql->fetch_object()) {
            $arr[] = $data;
        }

        return $arr;
    }
}
