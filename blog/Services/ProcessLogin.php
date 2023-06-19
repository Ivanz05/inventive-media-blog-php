<?php

namespace blog\Services;

include("Services/ProcessSignUpAbstract.php");

use blog\Services\ProcessSignUpAbstract;
use blog\Services\Database;

class ProcessLogin extends ProcessSignUpAbstract
{
    public $usernameError, $passwordError;

    // This will initialize this class
    public function __construct()
    {
        $this->usernameError = null;
        $this->passwordError = null;

        if (!isset($_SESSION)) {
            session_start();
        }
    }

    // This will perform login process.
    public function login()
    {
        if (
            empty($_POST["username"]) ||
            empty($_POST["password"])
        ) {
            return null;
        }

        $username = $_POST["username"];
        $password = $_POST["password"];

        $username = htmlspecialchars($username);
        $password = $this->filterPassword($password);

        // authenticate to database...
        $databaseClass = new Database;

        $databaseClass->connect();

        $sql = "
        SELECT * FROM users_table
        WHERE username = '$username'
        ";

        $result = $databaseClass->db->query($sql);

        if ($result->num_rows) {
            $userRecords = $result->fetch_assoc();

            $hashedPassword = $userRecords["password"];

            if (password_verify(
                $password->filteredPassword,
                $hashedPassword
            )) {
                $databaseClass->disconnect();
                // authenticate
                $_SESSION["auth"] = $username;
                $_SESSION["profile_picture"] = $userRecords["profile_picture"];
                header("location: home.php");
                die();
            }
        }

        $this->usernameError = "Invalid Credentials.";
        $databaseClass->disconnect();
    }

    // This will unauthenticate user.
    public function logout()
    {
        if (empty($_POST["isLoggedOut"])) {
            return null;
        }

        session_destroy();
        header("location: login.php");
        die();
    }
}
