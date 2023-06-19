<?php

namespace blog\Services;

class CheckAuthentication
{
    public function __construct()
    {
        session_start();
    }

    public function validatePage()
    {
        if (empty($_SESSION["auth"])) {
            header("location: login.php");
            die();
        }
    }

    public function guestPage()
    {
        if (!empty($_SESSION["auth"])) {
            header("location: home.php");
            die();
        }
    }
}
