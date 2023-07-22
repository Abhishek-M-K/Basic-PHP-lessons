<?php

// if (isset($_GET['submit'])) {
//     echo $_GET['email'];
//     echo $_GET['title'];
//     echo $_GET['ingredients'];
// }

include('config/db_connect.php');

$email = $title = $ingredients = '';
$errors = array('email' => '', 'title' => '', 'ingredients' => '');

if (isset($_POST['submit'])) {
    // echo htmlspecialchars($_POST['email']);
    // echo htmlspecialchars($_POST['title']);
    // echo htmlspecialchars($_POST['ingredients']);

    if (empty($_POST['email'])) {
        $errors['email'] = 'Email is required <br/>';
    } else {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // echo 'Email must be a valid email address';
            $errors['email'] = 'Email must be a valid email address';
        }
    }

    if (empty($_POST['title'])) {
        $errors['title'] =  'title is required <br/>';
    } else {
        $title = $_POST['title'];
        if (!preg_match('/^[a-zA-Z\s]/', $title)) {
            // echo 'Mail must be a valid text';
            $errors['title'] = 'title must be a valid text';
        }
    }

    if (empty($_POST['ingredients'])) {
        $errors['ingredients'] = 'Ingredients are required <br/>';
    } else {
        $ingredients = $_POST['ingredients'];
        if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $title)) {
            $errors['ingredients'] = 'Ingredients are required';
        }
    }

    //protecting SQL injections
    if (array_filter($errors)) {
        echo 'errors in the form';
    } else {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);
    }

    //creat sql query
    $sql = "INSERT INTO pizzas(email,title,ingredients) VALUES('$email', '$title', '$ingredients')";

    //save to the db and chek
    if (mysqli_query($conn, $sql)) {
        //success
        header('Location:pizza.php');
    } else {
        //error
        echo 'query error' . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">


<?php include('templates/header.php') ?>

<section class="container grey-text">
    <h4 class="center">Add a Pizza</h4>
    <form action="form.php" method="POST" class="white">
        <label for="email">Your Email : </label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
        <div class="red-text"><?php echo $errors['email'] ?></div>
        <label for="title">Pizza Name : </label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
        <div class="red-text"><?php echo $errors['title'] ?></div>
        <label for="ingredients">Ingredients (comma separated) : </label>
        <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
        <div class="red-text"><?php echo $errors['ingredients'] ?></div>
        <div class="center">
            <input type="submit" value="submit" name="submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>

<?php include('templates/footer.php') ?>

</html>