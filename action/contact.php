<?php 
require "../cfg/config.php"; 

    if(!empty($_POST['email']) AND !empty($_POST['message']))
    {
        $sql = "INSERT INTO contact (email, message) VALUES (:email, :message)";
        $pre = $pdo->prepare($sql);
        $pre->bindParam("email", htmlspecialchars($_POST['email']));
        $pre->bindParam("message", htmlspecialchars($_POST['message']));
        $pre->execute();

        header('Location:../index.php');

    } elseif(empty($_POST['email']) AND !empty($_POST['message']))
    {
        echo "Veuillez insérer votre email";
    }
    else {
        echo "Veuillez insérer votre message";
    }

?>