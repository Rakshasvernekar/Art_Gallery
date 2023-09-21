<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="stylelogin.css" />
    <title>Form Input Wave</title>
  </head>
  </html>
  <?php
// Check if the form is submitted
if (isset($_POST["email"]) && isset($_POST["password"])) {
    // Retrieve user inputs from the form
    $email = $_POST["email"];
    $password = $_POST["password"]; // Corrected variable name

    // Validate and sanitize the inputs (you should add more validation)
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $password = filter_var($password, FILTER_SANITIZE_STRING); // Securely hash the password

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
    $sql = "INSERT INTO users (email, password) VALUES (?, ?)";

    // Create a prepared statement
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error in preparing the statement: " . $conn->error);
    }

    // Bind the parameters and execute the statement
    $stmt->bind_param("ss", $email, $password);

    if ($stmt->execute()) {
        // Registration successful
        echo "Registration successful. <br>You can now <br><br><button class='btn1'><a href='login.html'>login</a></button>";
    } else {
        // Registration failed
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the prepared statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // If the form is not submitted, display an error message or redirect to the registration page.
    echo "Form not submitted!";
}
?>