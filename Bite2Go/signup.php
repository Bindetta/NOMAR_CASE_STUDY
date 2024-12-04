<?php
if (isset($_POST['signup'])){
    $conn = new mysqli('localhost', 'root', '', '(palagay yung name ng database)' );
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

$username = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$contact = mysqli_real_escape_string($conn, $_POST['contact']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

if ($password !== $confirm_password){
    echo "<script>alert('Passwords do not match po'); window.location.href='signup.php';</script>";
    exit();
}

$sql = "INSERT INTO users (username, email, contact, password) VALUES ('$username', '$email', '$contact', '$password')";

if ($conn->query($sql) === TRUE){
    echo "<script>alert('Registration sucessful'); window.location.href='login.php';</script>";
}else {
    echo "<script>alert('Error: " . $conn->error . "');</script>";
}
$conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="">
</head>
<body>

<div class="container">
    <h2>Sign Up</h2>
    <form action="signup.php" method="POST">
        <label for="username">USERNAME:</label>
        <input type="text" id="username" name="username" required>

        <label for="email">EMAIL:</label>
        <input type="email" id="email" name="email" required>

        <label for="contact">CONTACT:</label>
        <input type="text" id="contact" name="contact" required>

        <label for="password">PASSWORD:</label>
        <input type="password" id="password" name="password" required>

        <label for="confirm_password">CONFIRM PASSWORD:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>

        <button type="submit" name="signup">Sign Up</button>

    </form>

    <button onclick="window.location.href='login.php">Back</button>

    <p>Already have an account? <a href="login.php">Sign In</a></p>

</body>
</html>



<!-- Register Page -->