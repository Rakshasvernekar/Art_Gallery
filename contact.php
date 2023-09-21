<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">

    <title>Contact Us</title>
</head>
</html>
<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user inputs from the form
    $name = $_POST["name"];
    $email = $_POST["email"];
    $feedback = $_POST["feedback"];

    // Validate and sanitize the inputs (you should add more validation)
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $feedback = filter_var($feedback, FILTER_SANITIZE_STRING);

    // Create a database connection (replace with your database credentials)
    $host = "localhost";
    $username = "root";
    $db_password = "";
    $database = "gallery";

    $conn = new mysqli($host, $username, $db_password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare an SQL query to insert the data into the database
    $sql = "INSERT INTO contact (name, email, feedback) VALUES (?, ?, ?)";

    // Create a prepared statement
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error in preparing the statement: " . $conn->error);
    }

    // Bind the parameters and execute the statement
    $stmt->bind_param("sss", $name, $email, $feedback);

    if ($stmt->execute()) {
        // Data insertion successful
        echo "<center>Feedback submitted successfully.<br><br>
        <button>
        <a href='artwork.php'>Artwork</a>
        </button></center>";
    } else {
        // Data insertion failed
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the prepared statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // If the form is not submitted, display an error message or redirect to the form page.
    echo "Form not submitted!";
}
?>
