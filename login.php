<?php
// Establish a database connection (update with your credentials)
$servername = "localhost";
$username = "root";
$password = "";
$database = "gallery";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate inputs and protect against SQL injection (in a production environment, use prepared statements)
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Login successful
        // Store email and password in the backend (you can save them in a session or a database)
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;

        // Redirect to the next page
        header("Location: image.html");
        exit();
    } else {
        // Login failed
        echo "Invalid email or password.";
    }
}

// Close the database connection
$conn->close();
?>