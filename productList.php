<!-- productList.php-->
<!DOCTYPE html>
<html>
    <head>
    <title>Shopping Cart</title>
    </head>
<body>
    <center><br>
    
   <h2>Product List</h2>
   <br>
   <!-- What action does is it tells the browser which page to call-->
    <form action="cart.php" method="post">
        <?php include('get_product.php'); ?>
        <input type="submit" value="Add to Cart">
    </form>

    <h2>Shopping Cart</h2>
    <?php include('view_cart.php');         
    ?>

    <h2>Checkout</h2>
    <form action="checkout.php" method="post">
        <!--what "required" does is it makes sure the user inputs an email or else
        it doesn't proceed to the checkout page!-->
        To checkout, enter your email: <input type="email" name="email" required>
        <input type="submit" value="Checkout">
    </form>

<h3><br><br><a href='homepage.html'>Log-out!</a></h3>
<h3><a href = 'index.html'> Or Go Back To MainPage!</a><br><br></h3>
</center>
</body>
</html>