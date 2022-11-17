<?php

// On inclut la connexion à la base
require_once('connect.php');

// On écrit notre requête
$sql = 'SELECT * FROM Table_Livres';
$sth = $conn->prepare($sql);
$sth->execute();

/* Récupération de toutes les lignes d'un jeu de résultats */
//print("Récupération de toutes les lignes d'un jeu de résultats :\n");
$result = $sth->fetchAll();
//print_r($result);
// On exécute la requête

// On stocke le résultat dans un tableau associatif

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des oeuvres</title>
</head>
<body>

    <h1>Liste des oeuvres</h1>
    <table>
        <thead>
            <th>ID</th>
            <th>Titre</th>
            <th>Synopsis</th>
            <th>Auteur</th>
            <th>Actions</th>
        </thead>
        <tbody>
        <?php
            foreach($result as $Oeuvres){
        ?>
                <tr>
                    <td><?= $c['ID'] ?></td>
                    <td><?= $Oeuvres['Titre'] ?></td>
                    <td><?= $Oeuvres['Synopsis'] ?></td>
                    <td><?= $Oeuvres['Auteur'] ?></td>
                    <td><a href="edit.php?id=<?= $Oeuvres['ID'] ?>">Modifier</a>  <a href="delete.php?id=<?= $Oeuvres['ID'] ?>">Supprimer</a></td>
                </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
    <a href="add.php">Ajouter</a>
</body>
</html>