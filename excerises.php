<?php
// 1.
$users = [
    (object)[
        "name" => "John",
        "age" => 30,
        "address" => "Pasay"
    ],
    (object)[
        "name" => "Jane",
        "age" => 40,
        "address" => "Taguig"
    ]
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        li {
            margin-top: 5px;
            margin-bottom: 5px;
        }

        ul {
            list-style: none;
        }
    </style>
</head>

<body>
    <ul>
        <?php
        // $number = 0;

        // foreach ($users as $user) {
        //     echo "<h2>User " . ++$number . ":</h2>";

        //     echo "<li>";
        //     echo "Name: " . $user->name;
        //     echo "</li>";

        //     echo "<li>";
        //     echo "Age: " . $user->age;
        //     echo "</li>";
        // }
        ?>

        <?php foreach ($users as $user) : ?>
            <h1>
                <?php echo $user->name; ?>
            </h1>
        <?php endforeach; ?>

        <?php for ($i = 0; $i < 3; $i++) : ?>
            <h1></h1>
        <?php endfor; ?>

        <?php if (true) : ?>
        <?php endif; ?>
    </ul>

    <table>
        <?php for ($x = 1; $x <= 5; $x++) : ?>
            <tr>
                <?php for ($y = 1; $y <= 5; $y++) : ?>
                    <td>
                        <?php echo $x * $y; ?>
                    </td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
</body>

</html>