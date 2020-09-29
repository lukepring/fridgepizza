<!-- By Luke Pring -->

<?php 

    include('config/db_connect.php');

    if(isset($_POST['delete'])) {
        $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
        $sql = "DELETE FROM pizzas WHERE id = $id_to_delete";
        if(mysqli_query($conn, $sql)){
            // success
            header('Location: index.php?delete_success');
        } else {
            // failure
            echo "Query Error: " . mysqli_error($conn);        
        }
    }

    // Check GET request id param

    if(isset($_GET['id'])){

        $id = mysqli_real_escape_string($conn, $_GET['id']);

        // make sql

        $sql = "SELECT * FROM pizzas WHERE id = $id";

        // Get Query Results

        $result = mysqli_query($conn, $sql);

        // fetch result in array

        $pizza = mysqli_fetch_assoc($result);

        // Clear memory and Close Connection

        mysqli_free_result($result);

        mysqli_close($conn);

        // print_r($pizza);

    }

?>

<!DOCTYPE html>
<html>

    <?php include('templates/header.php'); ?>

    <div class="container center">

        <?php if($pizza): ?>

            <div class="card hoverable">
                <div class="card-content">
                    <h4><u><?php echo htmlspecialchars($pizza['title']); ?></u></h4>
                    <p>Created by: <?php echo htmlspecialchars($pizza['email']); ?></p>
                    <p><?php echo date($pizza['created_at']); ?></p>
                    <h5><u>Ingredients</u></h5>
                    <p><?php echo htmlspecialchars($pizza['ingredients']); ?></p>

                    <!-- Delete Form -->

                    <form action="details.php" method="POST">
                        <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id'] ?>">
                        <input type="submit" name="delete" value="Delete" class="btn brand">
                    </form>
                
                </div>
            </div>

        <?php else: ?>

            <div class="card hoverable">
                <div class="card-content">
                    <i class="large material-icons">error</i>
                    <h4>Sorry!</h4>
                    <h5>We couldn't find this pizza.</h5>
                    <a href="index.php" class="btn brand waves-effect back waves-light">Back</a>
                </div>
            </div>
            
        <?php endif; ?>

    </div>

    <?php include('templates/footer.php'); ?>

</html>
