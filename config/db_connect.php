<?php 

//connect to database
$conn = mysqli_connect('localhost', 'abhishek', 'test123', 'my_pizza');

if (!$conn) {
    echo 'Connection Error' . mysqli_connect_error();
}
