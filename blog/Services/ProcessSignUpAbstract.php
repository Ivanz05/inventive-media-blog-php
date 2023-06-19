<?php

namespace blog\Services;

include("Services/Traits/ProcessSignUpTrait.php");

use blog\Services\Traits\ProcessSignUpTrait;

abstract class ProcessSignUpAbstract
{
    use ProcessSignUpTrait;

    public function __construct()
    {
        $this->usernameError = null;
        $this->passwordError = null;
        $this->emailError = null;
        $this->passwordConfirmationError = null;
    }

    // Check if form inputs are empty or not.
    protected function checkEmptyInputs()
    {
        if (
            empty($_POST["username"]) ||
            empty($_POST["email"]) ||
            empty($_POST["password"]) ||
            empty($_POST["passwordConfirmation"])
        ) {
            return false;
        } else {
            return true;
        }
    }

    // This will filter password and confirm password
    protected function filterPassword($password, $passwordConfirmation = "")
    {
        // global $filteredPassword, $filteredConfirmPassword;

        // this is for password
        $filteredPassword = str_replace(" ", "", $password);
        $filteredPassword = trim($filteredPassword);
        // this is for password confirmation
        $filteredConfirmPassword = str_replace(" ", "", $passwordConfirmation);
        $filteredConfirmPassword = trim($filteredConfirmPassword);

        return (object) [
            "filteredPassword" => $filteredPassword,
            "filteredConfirmPassword" => $filteredConfirmPassword
        ];
    }

    // This will validate user's password and confirm password
    protected function validatePassword($filteredPassword, $filteredConfirmPassword)
    {
        $passwordLength = strlen($filteredPassword);

        // validation for password and confirm password
        if ($passwordLength >= 8 && $passwordLength <= 12) {
            if ($filteredPassword !== $filteredConfirmPassword) {
                $this->passwordConfirmationError = "Confirmation Password is not match";
            }
        } else {
            $this->passwordError = "Password invalid!";
        }
    }

    /**
     * This validates user's email input
     * 
     * @param string $email
     * @return null
     */
    protected function validateEmail($email)
    {
        // validation for email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->emailError = "Email is invalid!";
        }
    }
}
