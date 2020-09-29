<!-- By Luke Pring -->

<?php $conn = mysqli_connect('HOST', 'USERNAME', 'PASSWORD', 'DATABASE WHERE PIZZAS TABLE IS LOCATED');
if(!$conn) {echo 'Connection Error: ' . mysqli_connect_error();}?>