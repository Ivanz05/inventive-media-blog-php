<?php
$usernameError = null;
$passwordError = null;
$emailError = null;
$passwordConfirmationError = null;
$hasError = true;

if (checkEmptyInputs()) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordConfirmation = $_POST["passwordConfirmation"];

    $filteredPassword = filterPassword($password, $passwordConfirmation);

    $newPasswordInput = $filteredPassword->filteredPassword;
    $newConfirmPasswordInput = $filteredPassword->filteredConfirmPassword;
    // $newPasswordInput = $filteredPassword;
    // $newConfirmPasswordInput = $filteredConfirmPassword;

    validatePassword($newPasswordInput, $newConfirmPasswordInput);
    validateEmail($email);

    if ($hasError == false) {
        // saving
        $filteredUsername = htmlspecialchars($username);
        /**
         * Variables to save:
         * $filteredUsername
         * $email
         * $newPasswordInput
         */
        header("location: home.php");
        die();
    } else {
        // will not save anything!
    }
}

// Check if form inputs are empty or not.
function checkEmptyInputs()
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
function filterPassword($password, $passwordConfirmation)
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
function validatePassword($filteredPassword, $filteredConfirmPassword)
{
    $passwordLength = strlen($filteredPassword);

    // validation for password and confirm password
    if ($passwordLength >= 8 && $passwordLength <= 12) {
        if ($filteredPassword === $filteredConfirmPassword) {
            $GLOBALS["hasError"] = false;
        } else {
            $GLOBALS["passwordConfirmationError"] = "Confirmation Password is not match";
        }
    } else {
        $GLOBALS["passwordError"] = "Password invalid!";
    }
}

/**
 * This validates user's email input
 * 
 * @param string $email
 * @return null
 */
function validateEmail($email)
{
    // validation for email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $GLOBALS["hasError"] = false;
    } else {
        $GLOBALS["emailError"] = "Email is invalid!";
    }
}
