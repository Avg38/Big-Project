<?php 
require "../cfg/config.php"; 

    if(!empty($_POST['pseudo']) AND !empty($_POST['message']))
    {
        $sql = "INSERT INTO guestbook (pseudo, message) VALUES (:pseudo, :message)";
        $pre = $pdo->prepare($sql);
        $pre->bindParam("pseudo", htmlspecialchars($_POST['pseudo']));
        $pre->bindParam("message", htmlspecialchars($_POST['message']));
        $pre->execute();

        header('Location:../app/index.php');

    } elseif(empty($_POST['pseudo']) AND !empty($_POST['message']))
    {
        echo "Veuillez insérer votre pseudo";
    }
    else {
        echo "Veuillez insérer votre message";
    }

?>