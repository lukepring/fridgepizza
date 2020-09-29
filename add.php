<!-- By Luke Pring -->

<?php
    
    require('config/db_connect.php');

    $email = '';
    $title = '';
    $ingredients = '';

    $errors = array('email'=>'', 'title'=>'', 'ingredients'=>'');

    if(isset($_POST['submit'])) {

        // Check Email

        if(empty($_POST['email'])) {
            $errors['email']='An email is required';
        } else {
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email']='Please enter a valid email address.';
            }
        }

        // Check Title

        if(empty($_POST['title'])) {
            $errors['title']='A title is required';
        } else {
            $title = $_POST['title'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $title)) {
                $errors['title']='Title must only contain letter and spaces.';
            }
        }

        // Check Ingredients

        if(empty($_POST['ingredients'])) {
            $errors['ingredients']='Ingredients are required';
        } else {
            $ingredients = $_POST['ingredients'];
            if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
                $errors['ingredients']='Ingredients must only contain letters and be in a comma seperated list.';
            }
        }

        if(array_filter($errors)) {
            // Error
        } else {
            
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

            // create sql

            $sql = "INSERT INTO pizzas(title, email, ingredients) VALUES('$title', '$email', '$ingredients')";

            // save to db and check

            if(mysqli_query($conn, $sql)){
                // success
            } else {
                // error
                echo 'Query Error: ' . mysqli_error($conn);
            }


            header('Location: index.php');
        }


        // end of POST check
    }

?>

<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php') ?>
    <section class='container grey-text'>
        <h4 class="center">Add a Pizza</h4>
        <form action="" class="white" method="post">
            <div class="input-field col s6">
                <input id="email" type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
                <label for="email">Email</label>
            </div>
            <div class="red-text"><?php echo $errors['email'] ?></div>
            <div class="input-field col s6">
                <input id="title" type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
                <label for="title">Pizza Title</label>
            </div>
            <div class="red-text"><?php echo $errors['title'] ?></div>
            <div class="input-field col s6">
                <input id="ingredients" type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
                <label for="ingredients">Ingredients (comma separated)</label>
            </div>
            <div class="red-text"><?php echo $errors['ingredients'] ?></div>
            <div class="center">
                <input type="submit" name="submit", value="submit" class="btn brand">
            </div>
        </form>
    </section>
    <?php include('templates/footer.php') ?>
</html>