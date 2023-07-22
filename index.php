<?php
// $str = "My name is Abhishek ";
// // echo strlen($str);
// $cgpa = [9.06, 8.45, 9.35, 9.87];
// array_push($cgpa, 10);

// //associative arrays (key:value) pairs
// $people = ['abhishek' => 'khandare', 'rohit' => 'gupta'];
// // echo $people['rohit'];
// $people['chandu'] = 'gowda';
// print_r($people);

// $names = ['Abhishek', 'Mahesh', 'Khandare'];
// foreach ($names as $name) {
//     echo $name . '<br />';
// }

// function sayHello()
// {
//     echo "Hello Everyone !";
// }

// sayHello();

function listProduct($product)
{
    return "{$product['name']} costs $ {$product['price']} to buy <br />";
}

$listed = listProduct(['name' => '1985 Air Jordan Neutrals', 'price' => 5000]);
echo $listed;

include('new.php'); //carry ons with the code after throwing error
require('new.php'); //does not carry on with the code 
echo 'end of php'

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php</title>
</head>

<body>

    <!-- <p><?php echo $str ?></p>
    <p><?php echo str_replace("a", "o", $str) ?></p>
    <p><?php print_r($cgpa) ?></p> -->
</body>

</html>