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

    $post = $processPostClass->viewPost();

    $processPostClass->editPost();
    ?>

    <div class="navbar">
        <a href="home.php">Home</a>
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
            <h2>
                <?php
                echo $_SESSION["auth"];
                ?>
            </h2>
        </div>

        <div class="main">
            <h1>Edit Post</h1>

            <div class="container">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                    <label for="title">Title:</label>
                    <input type="text" name="title" required value="<?php echo $post["title"] ?>">

                    <br>

                    <label for="body">Body:</label>
                    <textarea name="body" cols="30" rows="10" required><?php echo $post["body"]; ?></textarea>

                    <button type="submit" style="padding: 10px; font-size: 10px">
                        Update
                    </button>
                </form>
            </div>
        </div>

    </div>
</body>

</html>