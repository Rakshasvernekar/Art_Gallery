<html>
    <head>
    <link rel="stylesheet" href="stylelogin.css" />

    </head>
</html>
<?php
// Check if a file was uploaded
if (isset($_FILES['image'])) {
    $title = $_POST['title'];
    $filename = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    // Define the directory to store uploaded images
    $upload_dir = 'uploads/';

    // Move the uploaded file to the specified directory
    if (move_uploaded_file($tmp_name, $upload_dir . $filename)) {
        // Insert image information into the database
        $host = "localhost";
    $username = "root";
    $db_password = "";
    $database = "gallery";

    $conn = new mysqli($host, $username, $db_password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO images (title, filename) VALUES ('$title', '$filename')";
        if ($conn->query($sql) === TRUE) {
            echo "Image successfully.<button><a href='artwork.php'>Artwork</a></button>";
        }
         else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo "Failed to upload image.";
    }
}
?>
