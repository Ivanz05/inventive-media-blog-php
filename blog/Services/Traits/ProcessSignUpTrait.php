<?php

namespace blog\Services\Traits;

include("Services/Database.php");

use blog\Services\Database;

trait ProcessSignUpTrait
{
    public $usernameError,
        $passwordError,
        $emailError,
        $passwordConfirmationError;

    // This will save the user's record.
    public function saveSignUp()
    {
        if ($this->checkEmptyInputs()) {
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $passwordConfirmation = $_POST["passwordConfirmation"];
            $profilePicture = $_FILES["profile_picture"];

            $directory = "uploads/";

            $filename = strtotime("today") . "_" . time() . "." . explode(".", $profilePicture["name"])[1];

            $filePath = $directory . $filename;

            move_uploaded_file($profilePicture["tmp_name"], $filePath);

            $filteredPassword = $this->filterPassword($password, $passwordConfirmation);

            $newPasswordInput = $filteredPassword->filteredPassword;
            $newConfirmPasswordInput = $filteredPassword->filteredConfirmPassword;
            // $newPasswordInput = $filteredPassword;
            // $newConfirmPasswordInput = $filteredConfirmPassword;

            $this->validatePassword($newPasswordInput, $newConfirmPasswordInput);
            $this->validateEmail($email);

            if (
                $this->passwordError == null &&
                $this->emailError == null &&
                $this->passwordConfirmationError == null
            ) {
                // saving
                $filteredUsername = htmlspecialchars($username);
                /**
                 * Variables to save:
                 * $filteredUsername
                 * $email
                 * $newPasswordInput
                 */

                $this->saveToDatabase(
                    $filteredUsername,
                    $email,
                    $newPasswordInput,
                    $filePath
                );

                header("location: home.php");
                die();
            } else {
                // will not save anything!
            }
        }
    }

    // This will now save records to database.
    private function saveToDatabase($username, $email, $password, $file)
    {
        $password = password_hash($password, PASSWORD_ARGON2I);

        $databaseClass = new Database;

        $databaseClass->connect();

        $sql = "
        INSERT INTO users_table (
            username,
            email,
            password,
            profile_picture
        )
        VALUES (
            '$username',
            '$email',
            '$password',
            '$file'
        )
        ";

        $databaseClass->db->query($sql);

        $databaseClass->disconnect();
    }
}
