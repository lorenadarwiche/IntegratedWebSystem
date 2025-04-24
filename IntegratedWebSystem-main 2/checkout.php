
<!--checkout.php-->
<?php
//What this program does is it grabs the users email and checkouts the products
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email'])) {
        // Retrieve email and cart data
        $email = $_POST['email'];


        // Clear the cart after checkout
        unset($_SESSION['cart']);

        echo "<center><br><br><br><br><br> Checkout successful! Confirmation email sent to {$email}.</center>";
        echo "<center><h3><a href='homepage.html'>Go back to Homepage to login again!</a></h3></center>";
        echo "<center><h3><a href='index.html'>Go back to Mainpage to read more about me</a></h3></center>";
    } else {
        echo "<center>Email address not provided.</center>";
        echo "<center><h3><a href='homepage.html'>Go back to Homepage to login again!</a></h3></center>";
    }
} else {
    echo "<center>Invalid request.</center>";
    echo "<center><h3><a href='homepage.html'>Go back to Homepage to login again!</a></h3></center>";
}
?>
<DOCTYPE html>
    <body><link rel="stylesheet" href="styles.css"> </body>
</DOCTYPE>
