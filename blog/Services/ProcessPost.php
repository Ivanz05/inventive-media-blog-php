<?php

namespace blog\Services;

// include("Services/Database.php");

use blog\Services\Database;

class ProcessPost
{
    public function getList()
    {
        $databaseClass = new Database;

        $databaseClass->connect();

        $sql = "
        SELECT * FROM posts_table
        ";

        $result = $databaseClass->db->query($sql);

        if ($result->num_rows) {
            $posts = [];
            $posts[] = $result->fetch_assoc();

            $databaseClass->disconnect();

            return $posts;
        } else {
            $databaseClass->disconnect();

            return [];
        }
    }

    public function viewPost()
    {
        if (empty($_GET["username"])) {
            return null;
        }

        $username = $_GET["username"];

        $databaseClass = new Database;

        $databaseClass->connect();

        $sql = "
        SELECT * FROM posts_table
        WHERE username = '$username'
        ";

        $result = $databaseClass->db->query($sql);

        if ($result->num_rows) {
            $post = $result->fetch_assoc();

            // header("location: view-post.php/?username=" . $post["username"]);
            // die();
            return $post;
        } else {
            header("location: home.php");
            die();
        }
    }

    public function editPost()
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
        UPDATE posts_table SET
        title = '$title',
        body = '$body'
        WHERE username = '$username'
        ";

        $databaseClass->db->query($sql);

        $databaseClass->disconnect();

        header("location: ../home.php");
        die();
    }
}
