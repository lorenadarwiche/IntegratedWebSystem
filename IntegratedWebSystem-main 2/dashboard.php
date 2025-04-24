<!-- dashboard.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Edit Some Content/Shopping Cart </title>
    <link rel="stylesheet" href="mystyle.css">
</head>
<body>

<?php
    session_start();
    // Includes everything in contentEdit.php
    echo "<br><br> <center><h2>Edit Some Content</h2></center><br>";
    include('contentEdit.php');

    include('productList.php');
?>

</body>
</html>
