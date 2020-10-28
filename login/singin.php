<?php

if(isset($_POST['submit'])) {

    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $pseudo = $_POST['pseudo'];


        $db = new PDO("mysql:host=localhost;dbname=shops","root", "");

}

    $sql = "SELECT * FROM users where email = '$email'";

    $result = $db ->prepare($sql);
    $result->execute();

    if($result->rowCount() > 0) {
        header('Location:../login/singin.php');
    }
    else {
        $pass = password_hash($pass, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (email, password, pseudo) VALUES ('$email', '$pass', '$pseudo')";

        $requette = $db->prepare($sql);
        $requette->execute();
        
        header('Location:../login/connexion.php');
    }
?>