<?php
// Connexion au serveur
$db = mysqli_connect('localhost', 'root', '', 'login');

// Vérifier la connexion
if (!$db) {
    die("Erreur de connexion: " . mysqli_connect_error());
}

// Vérifier si le formulaire est soumis
if (isset($_POST['Email']) && isset($_POST['Password'])) {
    $n = mysqli_real_escape_string($db, $_POST['Email']);
    $m = mysqli_real_escape_string($db, $_POST['Password']);

    // Vérifier si l'email existe déjà
    $check_query = "SELECT * FROM login WHERE Email='$n'";
    $result = mysqli_query($db, $check_query);

    if (mysqli_num_rows($result) > 0) {
        header("Location:http://localhost/project_php/html/erreur1.html") ;
    } else {
        // Insertion du contenu du formulaire
        $query = "INSERT INTO login (Email, Password) VALUES ('$n', '$m')";
        if (mysqli_query($db, $query)) {
            header("Location:http://localhost/project_php/html/index.html");
            exit();
        } else {
            echo "Échec de l'insertion: " . mysqli_error($db);
        }
    }
} else {
    echo "Les champs Email et Password sont requis.";
}

// Fermeture de la connexion
mysqli_close($db);
?>






