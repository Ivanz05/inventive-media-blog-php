<?php
include("Services/ProcessLogin.php");
include("Services/CheckAuthentication.php");

use blog\Services\ProcessLogin as Login;
use blog\Services\CheckAuthentication;

$checkAuthClass = new CheckAuthentication;

$checkAuthClass->guestPage();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Blog</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    $loginClass = new Login;

    $loginClass->login();
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="container">
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>
            <p>
                <?php echo $loginClass->usernameError; ?>
            </p>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
            <p>
                <?php echo $loginClass->passwordError; ?>
            </p>

            <button type="submit">Login</button>

            Need an account? <a href="signup.php">register here</a>
        </div>
    </form>

</body>

</html>