<?php
include("Services/CheckAuthentication.php");
include("Services/ProcessCreatePost.php");
include("Services/ProcessLogin.php");

use blog\Services\CheckAuthentication;
use blog\Services\ProcessCreatePost;
use blog\Services\ProcessLogin;

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

    $processCreatePostClass = new ProcessCreatePost;

    $processCreatePostClass->savePost();
    ?>

    <div class="navbar">
        <a href="home.php">Home</a>
        <a href="create-post.php" class="active">Create Post</a>
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
                John Doe
            </h2>
        </div>
        <div class="main">
            <h3>Create Post</h3>

            <div class="container">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                    <label for="title">Title:</label>
                    <input type="text" name="title" required>

                    <br>

                    <label for="body">Body:</label>
                    <textarea name="body" cols="30" rows="10" required></textarea>

                    <button type="submit" style="padding: 10px; font-size: 10px">
                        Save
                    </button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>