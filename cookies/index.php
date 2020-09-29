<?php include('../templates/header.php'); ?>

<div class="container">
        <div class="card">
        <div class="card-content center">
            <h1 class="brand-text">Cookies</h1>
            <h4 class="brand-text">What are cookies?</h4>
            <p><b>Cookies are small pieces of data stored on your device by websites.</b> 
                They can be used to store your preferences, who you are, and more. 
            </p>
            <h4 class="brand-text">How does FridgePizza use them?</h4>
            <p>
                We are currently using them as part of a small experiment.
                You may notice the "Hi, Guest(Unknown)" text in the header.
                We are using cookies to store a users name and gender inputted on
                <a href="../sandbox.php">the Sandbox page.</a> <br>
                We only store <b>3</b> cookies on your device. <br>
                1. cookie_law (Used so we can remember that you accepted our cookie notice, so we don't show it again.) <br>
                2. PHPSESSID (A session variable used to store an inputted name on our servers. When you leave the site, it gets deleted.) <br>
                3. gender (Used to store an inputted gender. This automatically deletes from your device after 24 hours.) <br> <br>
            </p>
            <p class="brand-text"><b>
                We will never track you or advertise to you based on your cookies.
            </b></p>
        </div>
    </div>
</div>

<?php include('../templates/footer.php') ?>
