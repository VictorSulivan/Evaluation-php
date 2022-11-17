<?php
    $servername = 'localhost';
    $username = 'root';
    $password = 'root';

    //On essaie d'établir la connexion
    try{
        //on utilise la methode PDO et on indique le serveur et l'identité de la personne qui se connecte
        $conn = new PDO("mysql:host=$servername;dbname=Base_De_Donnée_Livre", $username, $password);
        //la ligne 11 sert a verçifier si la connexion comporte des problemes ou si elle peut avoir lieu normalement
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    //si une exception arrive bloque la connexion et affiche l'erreur qui a eu lieu
    catch(PDOException $e){
        echo "ERROR : " . $e->getMessage();
    }
    
?>