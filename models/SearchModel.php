<?php

require_once __DIR__ . "/../configs/Config.php";
require_once __DIR__ . "/../app/helpers/formHelper.php";

class SearchModel extends Config
{

    private $formHelper;

    function __construct()
    {
        parent::__construct();
        $this->formHelper = new formHelper();
    }

    /**
     * search classroom
     * 
     * @param mixed $key
     * @return array
     */

    public function search($key): array
    {
        $key = $this->formHelper->sanitizeInput($key);
        $arr = array();

        $sql = $this->db->query("SELECT * FROM classrooms WHERE title LIKE '%$key%'");
        while ($data = $sql->fetch_object()) {
            $arr[] = $data;
        }

        return $arr;
    }

    /**
     * filter classroom
     * 
     * @param mixed $key
     * @return array
     */

    public function filter($key): array
    {
        $key = $this->formHelper->sanitizeInput($key);
        $arr = array();

        $sql = $this->db->query("SELECT * FROM classrooms WHERE category_id = '$key'");
        while ($data = $sql->fetch_object()) {
            $arr[] = $data;
        }

        return $arr;
    }
}
