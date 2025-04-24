<?php
session_start(); // Start session at the beginning

$config = include 'configure2.php';
$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userRegistration = $_POST['userRegistration'];
    $passRegistration = $_POST['passRegistration'];

    // Hash the password
    $passwordHash = password_hash($passRegistration, PASSWORD_DEFAULT);

    // Use prepared statements to insert the user
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $userRegistration, $passwordHash);

    if ($stmt->execute()) {
        $_SESSION['message'] = "You have successfully registered!";
        header("Location: homepage.html");
        exit();
    } else {
        $_SESSION['message'] = "Error during registration: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styling.css">
</head>
<body>
    <center>
        <title>Register</title>
        <br>
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-success">
                <?php echo $_SESSION['message']; unset($_SESSION['message']); ?>
            </div>
        <?php endif; ?>
        <form action="hpregister.php" method="POST">
            <label for="userRegistration">Username:</label>
            <input type="text" name="userRegistration" required><br>
            <label for="passRegistration">Password:</label>
            <input type="password" name="passRegistration" required><br><br>
            <input type="submit" value="Register">
        </form>
    </center>
</body>
</html>
