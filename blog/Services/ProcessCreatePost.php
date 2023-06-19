<?php

namespace blog\Services;

// include("Services/Database.php");

use blog\Services\Database;

class ProcessCreatePost
{
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public function savePost()
    {
        if (
            empty($_POST["title"]) ||
            empty($_POST["body"])
        ) {
            return null;
        }

        $title = $_POST["title"];
        $body = $_POST["body"];

        $title = htmlspecialchars($title);
        $body = htmlspecialchars($body);
        $username = $_SESSION["auth"];

        $databaseClass = new Database;

        $databaseClass->connect();

        $sql = "
        INSERT INTO posts_table (
            title,
            body,
            username
        )
        VALUES (
            '$title',
            '$body',
            '$username'
        )
        ";

        $databaseClass->db->query($sql);

        $databaseClass->disconnect();

        header("location: home.php");
        die();
    }
}
