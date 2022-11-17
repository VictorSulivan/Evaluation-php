<?php
require_once('connect.php');

if(isset($_POST)){
    if(isset($_POST['Titre']) && !empty($_POST['Titre'])
        && isset($_POST['Synopsis']) && !empty($_POST['Synopsis'])
        && isset($_POST['Auteur']) && !empty($_POST['Auteur'])){
            $Titre = strip_tags($_POST['Titre']);
            $Synopsis = strip_tags($_POST['Synopsis']);
            $Auteur = strip_tags($_POST['Auteur']);

            $sql = "INSERT INTO `Table_Livres` (NULL,`Titre`, `Synopsis`, `Auteur`) VALUES (:Titre, :Synopsis, :Auteur);";

            $query = $conn->prepare($sql);

            $query->bindValue(':Titre', $Titre, PDO::PARAM_STR);
            $query->bindValue(':Synopsis', $Synopsis, PDO::PARAM_STR);
            $query->bindValue(':Auteur', $Auteur, PDO::PARAM_INT);

            $query->execute();
            $_SESSION['message'] = "Oeuvre ajouté avec succès !";
            header('Location: index.php');
        }
}

require_once('close.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de creation d'oeuvre</title>
</head>
<body>
<form method="post">
    <label for="Titre">Titre</label>
    <input type="text" name="Titre" id="Titre">
    <label for="Synopsis">Synopsis</label>
    <input type="text" name="Synopsis" id="Synopsis">
    <label for="Auteur">Auteur</label>
    <input type="text" name="Auteur" id="Auteur">
    <button>Créer oeuvres</button>
</form>
</body>
</html>
