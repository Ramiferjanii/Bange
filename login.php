<?php

$db = mysqli_connect('localhost', 'root','', 'login');


if (!$db) {
    die("Erreur de connexion: " . mysqli_connect_error());
}


if (isset($_POST['Email']) && isset($_POST['Password'])) {
    $email = mysqli_real_escape_string($db, $_POST['Email']);
    $password = mysqli_real_escape_string($db, $_POST['Password']);

   
    $query = "SELECT * FROM login WHERE Email = '$email' AND Password = '$password'";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) == 1) {
        
        header("Location:http://localhost/project_php/html/exo1.html");
        exit();
    } else {
        header("Location:http://localhost/project_php/html/erreur.html") ; 
    }
} 

mysqli_close($db);
?>
