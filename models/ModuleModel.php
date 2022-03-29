<?php
require_once __DIR__ . "/../configs/Config.php";
require_once __DIR__ . "/../app/interfaces/ModelInterface.php";
require_once __DIR__ . "/../app/interfaces/ModuleInterface.php";
require_once __DIR__ . "/../app/helpers/formHelper.php";
require_once __DIR__ . "/../app/helpers/fileHelper.php";

class ModuleModel extends Config implements ModelInterface, ModuleInterface
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
        $title          = $this->formHelper->sanitizeInput($_POST['title']);
        $description    = $this->formHelper->sanitizeInput($_POST['description']);
        $content        = $_POST['content'];
        $slug           = str_replace(" ", "-", $title);

        $sql            = $this->db->query("SELECT * FROM modules WHERE id = '$id'");
        $fetch          = $sql->fetch_object();
        $countRows      = $sql->num_rows;

        $thumbnail      = $fetch->thumbnail;

        if ($countRows > 0) {
            if (!empty($_FILES['thumbnail']['name'])) {
                fileHelper::_removeImage($this->upload_path, $thumbnail);
                $thumbnail = $_FILES['thumbnail'];
                $thumbnail = fileHelper::_doUpload($this->upload_path, $thumbnail);
            }

            $this->db->query("UPDATE modules SET title = '$title', description = '$description', content = '$content', slug = '$slug', thumbnail = '$thumbnail' WHERE id = '$id'");
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
        $sql    = $this->db->query("SELECT * FROM modules WHERE id = '$id'")->fetch_object();
        $query  = $this->db->query("DELETE FROM modules WHERE id = '$id'");

        $this->redirect .= abs($_GET['class_id']);

        if (!$query) {
            alertHelper::failedAndRedirect("Data materi sedang digunakan", $this->redirect);
        } else {
            fileHelper::_removeImage($this->upload_path, $sql->thumbnail);
            alertHelper::successAndRedirect("Berhasil hapus materi", $this->redirect);
        }
    }

    /**
     * show specified data by classrooms id from the table
     *
     * @param int $id
     * @return array
     */

    public function getByClassroomId(int $id): array
    {
        $arr = array();
        $sql = $this->db->query("SELECT * FROM modules WHERE classrooms_id = '$id'");

        while ($data = $sql->fetch_object()) {
            $arr[] = $data;
        }

        return $arr;
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

        $sql = $this->db->query("SELECT m.*, c.slug AS course_slug, c.title AS course_title FROM modules m JOIN classrooms c ON c.id = m.classrooms_id WHERE m.id = '$id'")->fetch_object();

        $arr['id']               = $sql->id;
        $arr['classrooms_id']    = $sql->classrooms_id;
        $arr['classrooms_slug']  = $sql->course_slug;
        $arr['classrooms_title'] = $sql->course_title;
        $arr['title']            = $sql->title;
        $arr['description']      = $sql->description;
        $arr['content']          = $sql->content;
        $arr['thumbnail']        = $sql->thumbnail;
        $arr['slug']             = $sql->slug;
        $arr['created_at']       = $sql->created_at;

        return $arr;
    }

    /**
     * count data from modules table
     *
     * @return int
     */

    public function countRows(): int
    {
        return $this->db->query("SELECT * FROM modules")->num_rows;
    }
}
