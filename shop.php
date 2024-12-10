<?php
$servername = "localhost";
$username = 'root';

$dbname = "form";


$conn = new mysqli($servername,$username , '', $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


function sanitize($data) {
    return htmlspecialchars(strip_tags(trim($data))); // trim  Removes any whitespace from the beginning and end of the input data. Strips out any HTML or PHP tags from the data to prevent script injection.
}

$firstname = sanitize($_POST['firstname']);
$lastname = sanitize($_POST['lastname']);
$age = (int)sanitize($_POST['age']);
$dob = sanitize($_POST['dob']);
$gender = sanitize($_POST['occupation']);
$email = sanitize($_POST['email']);
$address = sanitize($_POST['address']);
$address2 = sanitize($_POST['address2']);
$areacode = sanitize($_POST['areacode']);
$phone = sanitize($_POST['phone']);
$post = sanitize($_POST['post']);
$city = sanitize($_POST['city']);


$uploadDir = "uploads/";
$uploadFile = $uploadDir . basename($_FILES["upload"]["name"]); // This sets the directory where you want to store the uploaded files. In this case, it's the "uploads" directory.

if (move_uploaded_file($_FILES["upload"]["tmp_name"], $uploadFile)) {
    $fileUploaded = true;
} else {
    $fileUploaded = false;
    $uploadFile = null; 
}


$sql = "INSERT INTO users (firstname, lastname, age, dob, gender, email, address, address2, areacode, phone, post, city, upload)
VALUES ('$firstname', '$lastname', $age, '$dob', '$gender', '$email', '$address', '$address2', '$areacode', '$phone', '$post', '$city', '$uploadFile')";

if ($conn->query($sql) === TRUE) {
    header("Location:http://localhost/project_php/html/cv/message.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
