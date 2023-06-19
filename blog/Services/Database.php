<?php

namespace blog\Services;

use mysqli;

class Database
{
    private $servername,
        $username,
        $password,
        $database;
    public $db;

    // This will initialize this class.
    public function __construct()
    {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->database = "blog_database";
    }

    // This will start database connection.
    public function connect()
    {
        $this->db = new mysqli(
            $this->servername,
            $this->username,
            $this->password,
            $this->database
        );

        if ($this->db->connect_error) {
            die();
        }
    }

    // This will close database connection.
    public function disconnect()
    {
        $this->db->close();
    }
}
