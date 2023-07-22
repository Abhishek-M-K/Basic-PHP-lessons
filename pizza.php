<?php

// //connect to database
// $conn = mysqli_connect('localhost', 'abhishek', 'test123', 'my_pizza');

// if (!$conn) {
//     echo 'Connection Error' . mysqli_connect_error();
// }

include('config/db_connect.php');

//get data

$sql = 'SELECT email ,title, ingredients, id FROM pizzas ORDER BY created_at';

$result = mysqli_query($conn, $sql);

//fetch resulting rows as an array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);
// print_r($pizzas);

//print_r(explode(',', $pizzas[0]['ingredients']));


?>

<!DOCTYPE html>
<html lang="en">


<?php include('templates/header.php') ?>

<h4 class="center grey-text">Pizzas ! Order now</h4>
<div class="container">
    <div class="row">
        <?php foreach ($pizzas as $pizza) { ?>
            <div class="col s6">
                <div class="card z-depth-0">
                    <img src="img/pizza.svg" class="pizza">
                    <div class="card-content center">
                        <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
                        <!-- <div><?php echo htmlspecialchars($pizza['ingredients']); ?></div> -->
                        <ul>
                            <?php foreach (explode(',', $pizza['ingredients']) as $ing) : ?>
                                <li><?php echo htmlspecialchars($ing) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="card-action right-align">
                        <a href="details.php?id=<?php echo $pizza['id'] ?>" class="brand-text">More Info</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php include('templates/footer.php') ?>

</html>