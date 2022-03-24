<?php
require_once __DIR__ . "/../configs/Config.php";
require_once __DIR__ . "/../app/interfaces/ModelInterface.php";
require_once __DIR__ . "/../app/interfaces/ClassroomInterface.php";
require_once __DIR__ . "/../app/helpers/formHelper.php";
require_once __DIR__ . "/../app/helpers/fileHelper.php";

class ClassroomModel extends Config implements ModelInterface, ClassroomInterface
{
    private $formHelper;
    private $upload_path = "assets/images/classroom_thumbnails/";
    private $module_path = "assets/images/module_thumbnails/";
    private $redirect = "index.php?page=dashboard&content=classroom&menu=list";

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
        $title          = $this->formHelper->sanitizeInput($_POST['title']);
        $category_id    = $this->formHelper->sanitizeInput($_POST['category_id']);
        $description    = $this->formHelper->sanitizeInput($_POST['description']);
        $is_visible     = $this->formHelper->sanitizeInput($_POST['is_visible']);
        $slug           = str_replace(" ", "-", $title);
        $created_by     = $_SESSION['user_id'];

        $sql        = $this->db->query("SELECT * FROM classrooms WHERE id = '$id' AND created_by = '$created_by'");
        $fetch      = $sql->fetch_object();
        $countRows  = $sql->num_rows;
        $thumbnail  = $fetch->thumbnail;

        if ($countRows > 0) {
            if (!empty($_FILES['thumbnail']['name'])) {
                fileHelper::_removeImage($this->upload_path, $thumbnail);
                $thumbnail = $_FILES['thumbnail'];
                $thumbnail = fileHelper::_doUpload($this->upload_path, $thumbnail);
            }

            $this->db->query("UPDATE classrooms SET category_id ='$category_id', title = '$title', thumbnail = '$thumbnail', description = '$description', is_visible = '$is_visible', slug = '$slug', updated_at = NOW() WHERE id = '$id'");
        } else {
            alertHelper::failedActions("data tidak ditemukan");
        }
    }

    /**
     * count if classroom is already purchased by user
     * 
     * @param int $id
     * @return int
     */

    public function isPurchasedClassroom(int $id): int
    {
        return $this->db->query("SELECT * FROM user_classrooms WHERE classrooms_id = '$id'")->num_rows;
    }

    /**
     * delete all modules if classroom is deleted
     * 
     * @param int $id
     * @return int
     */

    public function massDeleteModules(int $id): void
    {
        $arr        = array();
        $sql        = $this->db->query("SELECT * FROM modules WHERE classrooms_id = '$id'");
        $countRows  = $sql->num_rows;

        if ($countRows > 0) {
            while ($data = $sql->fetch_object()) {
                $arr[] = $data;
            }
            foreach ($arr as $data) {
                fileHelper::_removeImage($this->module_path, $data->thumbnail);
            }

            $this->db->query("DELETE FROM modules WHERE classrooms_id = '$id'");
        }
    }

    /**
     * delete specified classroom using id and user sesssion
     * 
     * @param int $id
     * @param int $created_by
     * @return void
     */

    public function deleteSpecifiedClassroom(int $id, int $created_by): void
    {
        $sql = $this->db->query("SELECT * FROM classrooms WHERE id = '$id' AND created_by = '$created_by'")->fetch_object();
        fileHelper::_removeImage($this->upload_path, $sql->thumbnail);
        $this->db->query("DELETE FROM classrooms WHERE id = '$id'");
    }

    /**
     * delete specified classroom by id.
     * 
     * @param int $id
     * @return void
     */

    public function delete(int $id): void
    {
        if ($this->isPurchasedClassroom($id) > 0) {
            alertHelper::failedAndRedirect('Gagal menghapus! kelas telah dibeli user!', $this->redirect);
        } else {
            $this->massDeleteModules($id);
            $this->deleteSpecifiedClassroom($id, $_SESSION['user_id']);
            alertHelper::successAndRedirect("Berhasil menghapus kelas!", $this->redirect);
        }
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
        $sql = $this->db->query("SELECT c.id, cat.id AS category_id, cat.name AS category_name, c.title, c.thumbnail, c.description, c.is_visible, u.name AS user_name, c.created_at, c.updated_at FROM classrooms c JOIN categories cat ON cat.id = c.category_id JOIN user u ON u.id = c.created_by WHERE c.id = '$id'")->fetch_object();
        $arr['id']              = $sql->id;
        $arr['category_id']     = $sql->category_id;
        $arr['category_name']   = $sql->category_name;
        $arr['title']           = $sql->title;
        $arr['thumbnail']       = $sql->thumbnail;
        $arr['description']     = $sql->description;
        $arr['is_visible']      = $sql->is_visible;
        $arr['created_by']      = $sql->user_name;
        $arr['created_at']      = $sql->created_at;
        $arr['updated_at']      = $sql->updated_at;

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
