<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    /*
    echo "Hello World";
    echo "<h1> Hello World </h1>";
    */
    // echo "Hello World";
    // print "Hello World";

    // Data type of String
    // $name1 = "<h1>John</h1>";
    // $name1 = '<h1>Jane</h1>';
    // $name2 = $name1;
    // echo $name2;

    // Data type of integer
    // $age = 20;
    // $age = 30;
    // $age1 = $age;
    // echo $age1;

    // Data type of float
    // $weight = 5.8;
    // $weight = 1.0;
    // echo $weight;

    // Data type of boolean
    // $condition = false;
    // echo $condition;

    // Data type of array
    // $names = [
    //     "John", // 0
    //     "Jane", // 1
    // ];
    // $name1 = $names[0] . " and " . $names[1];
    // echo $name1;

    // Data type of multidimentional array
    // $cars = [
    //     [
    //         "toyota", // 0
    //         "kia" // 1
    //     ], // 0
    //     ["2015", "2002"] // 1
    // ];
    // echo $cars[0][0] . " year model " . $cars[1][1];

    // Data type of object
    // $cars = (object) [
    //     "brands" => (object) [
    //         "toyota" => "toyota",
    //         "kia" => "kia"
    //     ],

    //     "model" => [
    //         "2015",
    //         "2002"
    //     ]
    // ];
    // echo $cars->brands->toyota . " year model " . $cars->model[1];

    // Data type of null
    // $name = NULL; // empty
    // echo $name;

    // Example for strlen()
    // echo strlen("My name is John"); // value of 15

    // Example of str_word_count()
    // echo str_word_count("My name is John!"); // value of 4

    // Example of str_replace()
    // echo str_replace("John", "Jane", "My name is John");

    // Example of constants
    // define("name", "John");
    // echo name;

    // Example for operators
    // $a = 1;
    // $b = 2;
    // echo $a + $b; // 3

    // Example for comparison operators
    // $x = 1;
    // $y = 2;
    // echo $x == $y; // true

    // Example of increment/decrement
    // $x = 1;
    // echo ++$x;

    // Example of if statement
    // $x = 1;
    // $y = 2;

    // if ($x > $y) {
    //     echo "This is true!";
    // }

    // echo "This is end of code!";

    // Example of if else statement
    // $x = 1;
    // $y = 2;

    // if ($x < $y) {
    //     echo "This is true!";
    // } else {
    //     echo "This is false!";
    // }

    // Example of if elseif else statement
    // $grade = 75;

    // if ($grade >= 75) {
    //     // echo "You passed!";
    //     if ($name === "John") {
    //         echo "John is passed!";
    //     } else if ($name === "Jane") {
    //         echo "Jane is passed!";
    //     } else {
    //         echo "You passed!";
    //     }
    // } else if ($grade <= 70) {
    //     // echo "You failed!";
    // } else {
    //     echo "";
    // }

    // Example of switch statement
    // $grade = 70;
    // $name = "John";

    // switch ($name) {
    //     case "John":
    //         if ($grade >= 75) {
    //             echo "You passed! John";
    //         } else if ($grade <= 70) {
    //             echo "You failed! John";
    //         }

    //         break;
    //     case "Jane":
    //         if ($grade >= 75) {
    //             echo "You passed! Jane";
    //         } else if ($grade <= 70) {
    //             echo "You failed! Jane";
    //         }

    //         break;
    //     default:
    //         echo "Error found!";
    //         break;
    //         // case 75:
    //         //     echo "You are passed!";
    //         //     break;
    //         // case 70:
    //         //     echo "You failed!";
    //         //     break;
    //         // case 90:
    //         //     echo "You passed!";
    //         //     break;
    //         // default:
    //         //     echo "This is default";
    //         //     break;
    // }

    // Example of while loop
    // $x = 1;
    // while ($x <= 3) {
    //     echo $x . "<br>";
    //     $x++;
    // }
    // echo "out of loop!";

    // Example of do while loop
    // $x = 0;

    // do {
    //     $x++;
    //     echo $x . "<br>";
    // } while ($x <= 3);

    // echo "out of loop!";

    // Example of for loop
    // for ($x = 0; $x <= 3; $x++) {
    //     echo $x . "<br>";
    // }

    // Example of foreach loop
    // $cars = (object) [
    //     "brands" => (object) [
    //         "toyota" => "toyota",
    //         "kia" => "kia"
    //     ],

    //     "model" => (object) [
    //         "kia" => "2015",
    //         "toyota" => "2002"
    //     ]
    // ];
    // foreach ($cars as $key => $car) {
    //     foreach ($car as $value) {
    //         echo $key . " = " . $value . "<br>";
    //     }
    // }

    // Example of function
    // $newName = setNewName("Jane");

    // echo "Your new name is " . $newName . "<br>";
    // echo "End of code!";

    // /**
    //  * This function sets an new name for user.
    //  */
    // function setNewName($newName = "John")
    // {
    //     // echo "Your new name is " . $newName . "<br>";
    //     return $newName;
    // }

    // Example of local and global scopes
    // $name = "John";
    // function setNewName()
    // {
    //     global $age;

    //     $age = 20;

    //     echo $GLOBALS["name"];
    // }
    // setNewName();
    // echo $age;

    // Another example for arrays
    // $cars = array("toyota", "kia"); // ["toyota", "kia"]
    // $cars[0] = "ford";
    // echo $cars[0];
    // $ages = [25, 15, 35];
    // sort($ages);
    // asort($ages);
    // ksort($ages);
    // foreach ($ages as $age) {
    //     echo $age . "<br>";
    // }

    // Example of one liner if statement
    // $x = 1;
    // $y = 2;
    // echo ($x < $y) ? x(true) : x(false);
    // // echo ($x < $y) ?
    // //     (($x > $y) ? "True" : "False") :
    // //     "False";
    // function x($isTrue)
    // {
    //     if ($isTrue) {
    //         echo "True";
    //     } else {
    //         echo "False";
    //     }
    // }

    // Example for debugging
    // die();
    // try {
    //     throw new Exception("Division by zero");
    // } catch (Exception $e) {
    //     error_log($e, 3, "error.log");
    //     echo $e;
    // }

    // Example of explode
    // $string = "Hello to our website please use this code <code>WELCOME<code>";
    // $array = explode("<code>", $string);
    // echo $array[1];
    // var_dump();

    // Example of array count
    // $cars = [
    //     "toyota",
    //     "kia",
    //     "ford"
    // ];
    // echo count($cars); // 3

    // DAY 3 - classes
    // $petClass = new Pets("Chichi");
    // echo $petClass->getName();
    // echo $petClass->getName();

    // echo $petClass->getName();
    // echo $petClass->dogName;
    // echo $petClass->getAge();

    // echo (new Pets("Chichi"))->getName();
    // echo (new Pets("Coco"))->getName();
    ?>
</body>

</html>