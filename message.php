<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];


    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'contact_form');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO messages (name, email, subject , message) VALUES ('$name', '$email', '$subject' , '$message')";

    if ($conn->query($sql) === TRUE) {
        header("Location:http://localhost/project_php/html/cv/message.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
