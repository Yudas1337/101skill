<?php

/**
 * server configuration.
 */

class Config
{

    private $server = "localhost";
    private $user = "root";
    private $pass = "";
    private $database = "db_skill";

    public $db;

    function __construct()
    {
        $this->connect_database();
    }

    /**
     * function to connect to database
     * @return void
     */

    public function connect_database(): void
    {
        $this->db = new mysqli($this->server, $this->user, $this->pass, $this->database);

        if (!$this->db) {
            die("failed connect to database " . $this->db->connect_error());
        }
    }
}
