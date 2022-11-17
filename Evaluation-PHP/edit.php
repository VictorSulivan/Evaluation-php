<?php
require_once('connect.php');

if(isset($_POST)){
    if(isset($_POST['ID']) && !empty($_POST['ID'])
        && isset($_POST['Titre']) && !empty($_POST['Titre'])
        && isset($_POST['Synopsis']) && !empty($_POST['Synopsis'])
        && isset($_POST['Auteur']) && !empty($_POST['Auteur'])){
        $id = strip_tags($_GET['ID']);
        $produit = strip_tags($_POST['Titre']);
        $Synopsis = strip_tags($_POST['Synopsis']);
        $nombre = strip_tags($_POST['Auteur']);

        $sql = "UPDATE Table_Livres SET `Titre`=:Titre, `Synopsis`=:Synopsis, `Auteur`=:Auteur WHERE `ID`=:ID;";

        $query = $db->prepare($sql);

        $query->bindValue(':Titre', $Titre, PDO::PARAM_STR);
        $query->bindValue(':Synopsis', $Synopsis, PDO::PARAM_STR);
        $query->bindValue(':Auteur', $nombre, PDO::PARAM_INT);
        $query->bindValue(':ID', $ID, PDO::PARAM_INT);

        $query->execute();

        header('Location: index.php');
    }
}

if(isset($_GET['ID']) && !empty($_GET['ID'])){
    $ID = strip_tags($_GET['ID']);
    $sql = "SELECT * FROM Table_Livres WHERE `ID`=:ID;";

    $query = $conn->prepare($sql);

    $query->bindValue(':ID', $ID, PDO::PARAM_INT);
    $query->execute();

    $result = $query->fetch();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Oeuvres</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <h1>Modifier une Oeuvre</h1>
    <form method="post">
        <p>
            <label for="Titre">Titre</label>
            <input type="text" name="Titre" id="Titre" value="<?= $result['Titre'] ?>">
        </p>
        <p>
            <label for="Synopsis">Synopsis</label>
            <input type="text" name="Synopsis" id="Synopsis" value="<?= $result['Synopsis'] ?>">
        </p>
        <p>
            <label for="Auteur">Auteur</label>
            <input type="text" name="Auteur" id="Auteur" value="<?= $result['Auteur'] ?>">
        </p>
        <p>
            <button>Enregistrer</button>
        </p>
        <input type="hidden" name="id" value="<?= $result['id'] ?>">
    </form>
</body>
</html>
