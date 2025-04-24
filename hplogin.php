<?php
session_start();

$config = include 'configure2.php';
$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userLogin = $_POST['userLogin'];
    $passLogin = $_POST['passLogin'];

    // Use prepared statements to retrieve user data
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $userLogin);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($passLogin, $row['password'])) {
            unset($_SESSION['cart']); // Reset cart
            header("Location: dashboard.php");
            exit();
        } else {
            echo "<center><h1>Incorrect password!</h1></center>";
        }
    } else {
        echo "<center><h1>Username not found!</h1></center>";
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <center>
        <form action="hplogin.php" method="POST">
            <label for="userLogin">Username:</label>
            <input type="text" name="userLogin" required><br>
            <label for="passLogin">Password:</label>
            <input type="password" name="passLogin" required><br><br>
            <input type="submit" value="Login">
        </form>
        <a href="homepage.html">Go back to Homepage</a>
    </center>
</body>
</html>
