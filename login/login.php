<?php

    session_start();

    if(isset($_POST['submit'])) {

        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $pseudo = $_POST['pseudo'];

    
            $db = new PDO("mysql:host=localhost;dbname=shops","root", "");


        $sql = "SELECT * FROM users where email = '$email' and pseudo = '$pseudo'";
        $result = $db->prepare($sql);
        $result->execute();

        if($result->rowCount() > 0) {

            $data = $result->fetchAll();
            
            if(password_verify($pass, $data[0]['password'])) {

                //var_dump($data);

                 $_SESSION['pseudo'] = $pseudo;
                header('Location:../index.php');//crée une session avec l'utilisateur après connection
            
            }

            else {

               // header('Location:../index.php');
               echo 'erreur de Mdp';
            }
        }
        else {
           // header('Location:connexion.php'):
           echo 'ce compte n\'existe pas';
        }

    }
?>