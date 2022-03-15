<?php

require_once __DIR__ . "/../configs/Config.php";

class CustomerModel extends Config
{

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get All customer .
     * 
     * @return array
     */

    public function show(): array
    {
        $arr = array();

        $sql = $this->db->query("SELECT * FROM user WHERE role = 'public' ORDER BY id DESC");
        while ($data = $sql->fetch_object()) {
            $arr[] = $data;
        }

        return $arr;
    }
}
