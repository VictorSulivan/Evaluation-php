<?php
require_once('connect.php');

if(isset($_GET['ID']) && !empty($_GET['ID'])){
    $ID = strip_tags($_GET['ID']);
    $sql = "DELETE FROM Table_Livres WHERE `ID`=:ID;";

    $query = $conn->prepare($sql);

    $query->bindValue(':ID', $ID, PDO::PARAM_INT);
    $query->execute();
    //$sql = 'SELECT * FROM Table_Livres';
    //$sth = $conn->prepare($sql);
    //$sth->execute();
    header('Location: index.php');
}
?>