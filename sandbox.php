<!-- By Luke Pring -->

<?php 

    if(isset($_POST['submit'])) {

        // cookie for gender

        setcookie('gender', $_POST['gender'], time() + 86400);

        session_start();

        $_SESSION['name'] = $_POST['name'];

        echo $_SESSION['name'];

        header('Location: index.php');

    }

?>

<!DOCTYPE html>
<style>
    body {
        font-family:Arial, Helvetica, sans-serif;
    }
</style>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<center>
<body>
<h1>Do not touch this page unless you know what you're doing!</h1>
<div class="container">
    <div class="card">
        <div class="card-content">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <input type="text" name="name">
                <br>
                <select name="gender">
                    <option value="male">male</option>
                    <option value="female">female</option>
                </select>
                <input type="submit" value="Submit" name="submit">
            </form>
        </div>
    </div>
</div>
</center>