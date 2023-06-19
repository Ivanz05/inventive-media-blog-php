<?php
include("Services/ProcessLogin.php");
include("Services/CheckAuthentication.php");
include("Services/ProcessPost.php");

use blog\Services\ProcessLogin;
use blog\Services\CheckAuthentication;
use blog\Services\ProcessPost;

$checkAuthClass = new CheckAuthentication;

$checkAuthClass->validatePage();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Blog</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="css/styles.css" />
</head>

<body>

    <?php
    $processLoginClass = new ProcessLogin;

    $processLoginClass->logout();

    $processPostClass = new ProcessPost;

    $allPosts = $processPostClass->getList();
    ?>

    <div class="navbar">
        <a href="home.php" class="active">Home</a>
        <a href="create-post.php">Create Post</a>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <input type="hidden" name="isLoggedOut" value="true">
            <button type="submit" style="padding: 10px; font-size: 20px; float: right">
                Logout
            </button>
        </form>
    </div>

    <div class="row">
        <div class="side">
            <img src="<?php echo $_SESSION["profile_picture"]; ?>" style="height:50px; width: 50px" alt="">
            <h2>
                <?php
                echo $_SESSION["auth"];
                ?>
            </h2>
        </div>
        <div class="main">
            <ul>
                <?php
                foreach ($allPosts as $post) :
                ?>

                    <form action="view-post.php" method="GET">
                        <input type="hidden" value="<?php echo $post["username"]; ?>" name="username">
                        <li>
                            <h1>
                                <?php echo $post["title"]; ?>
                            </h1>

                            <p>
                                <?php echo $post["body"]; ?>
                            </p>

                            <p>
                                Authored by: <?php echo $post["username"]; ?>
                            </p>

                            <button type="submit">View Post</button>

                        </li>
                    </form>

                <?php endforeach; ?>
            </ul>
        </div>
    </div>

</body>

</html>