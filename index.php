<!-- By Luke Pring -->

<?php

    require('config/db_connect.php');

    // write query for all pizzas

    $sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

    // make query & get result
    
    $result = mysqli_query($conn, $sql);

    // fetch the resulting rows as an array

    $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // print_r($pizzas);

    // free from memory

    mysqli_free_result($result);

    // close connection

    mysqli_close($conn);

    if(isset($_GET['delete_success'])) {echo "<script type='text/javascript'>alert('Pizza deleted successfully.');</script>";}

    

?>

<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php') ?>

    <h3 class='center msg'>Share your favorite pizza toppings with the world.</h2>

    <div class="card">
        <div class="card-content center">
            <p class="rainbow-text">Final Update Out Now!</p>
            <a href="https://lukesfridge.xyz/changelogs/pizza" class="btn rainbow-text">Find out more</a>        
        </div>
    </div>
    
    
    <h4 class="center grey-text"><b>Pizzas</b></h4>

    <div class="container">
        <div class="row">

            <?php if(empty($pizzas)): ?>
                <h5 class="center grey-text">We've ran out of pizza. 😥</h6>
            <?php endif; ?>

            <?php foreach($pizzas as $pizza): ?>

                <div class="col s12 med6 l4">
                    <div class="card hoverable">
                        <div class="card-content center">
                            <img src="images/pizza.svg" alt="Pizza Image" class="pizzaimg">
                            <h5><b><?php echo htmlspecialchars($pizza['title']); ?></b></h5>
                            <ul>
                                <?php foreach(explode(',', $pizza['ingredients']) as $ing): ?>
                                    <li class="truncate"><?php echo htmlspecialchars($ing); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="card-action">
                            <a href="details.php?id=<?php echo $pizza['id']; ?>" class="brand-text">More Info</a>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>
    </div>

    <?php include('templates/footer.php') ?>
    
</html>