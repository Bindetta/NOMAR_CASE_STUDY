<?php
if (isset($_POST['login'])){
    $conn = new mysqli('localhost', 'root', '', '(palagay yung name ng database)');
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
        if ($password == $row['password']) {
            echo "<script>alert('Login successful!'); window.location.href='(PAREPLACE TO NG DASHBOARD ETC)';</script>";  
        } else {
            echo "<script>alert('Invalid password!');</script>";
        }
    } else {
        echo "<script>alert('No user found with this email!');</script>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="">
</head>
<body>
    
<div class="container">
    <h2>Sign In</h2>
    <form action="login.php" method="POST">
    
        <label for="email">EMAIL:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">PASSWORD:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit" name="login">Sign In</button>
    </form>

    <p>Don't Have an account? <a href="signup.php">Sign Up</a></p>
</body>
</html>



<!-- Login Page -->