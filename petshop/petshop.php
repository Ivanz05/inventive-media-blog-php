<?php
include("Pets.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    WELCOME TO MY PET SHOP

    <br>

    <ul>
        <?php
        $petClass = new Pets;

        $petList = $petClass->getList(); // this is an array, list of all pets

        foreach ($petList as $pet) :
        ?>

            <li>
                <?php echo $pet; ?>
            </li>

        <?php endforeach; ?>
    </ul>

    <?php
    $petClass = new Pets;

    echo $petClass->getOwnerName();
    ?>


</body>

</html>