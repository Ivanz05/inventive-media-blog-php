<?php
include("Services/ProcessSignup.php");
include("Services/CheckAuthentication.php");

use blog\Services\ProcessSignup as BlogProcessSignUp;
use blog\Services\CheckAuthentication;

$checkAuthClass = new CheckAuthentication;

$checkAuthClass->guestPage();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">

    <style>
        html,
        body {
            min-height: 100%;
            margin: auto;
            display: grid;
        }

        form {
            border: 3px solid #f1f1f1;
            max-width: 500px;
            margin: auto;
        }

        button {
            background-color: #04AA6D;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }

        .container {
            padding: 16px;
        }
    </style>
</head>

<body>
    <?php
    $signupClass = new BlogProcessSignUp;

    $signupClass->saveSignUp();
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
        <label for="profile_picture">Profile Picture:</label>
        <input type="file" name="profile_picture">

        <br>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <p>
            <?php echo $signupClass->usernameError; ?>
        </p>

        <br>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>
        <p>
            <?php echo $signupClass->emailError; ?>
        </p>

        <br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <p class="error-message">
            <?php echo $signupClass->passwordError; ?>
        </p>

        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" id="password_confirmation" name="passwordConfirmation" required>
        <p class="error-message">
            <?php echo $signupClass->passwordConfirmationError; ?>
        </p>

        <button type="submit">Submit</button>
    </form>
</body>

</html>