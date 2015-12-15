<?php
include("connexion_BD.php");
include("classe/type_produit.php");

$monTypeProduit = new TypeProduit();
$monTypeProduit->init(1, "Bague", "BA");
$monTypeProduit->printTypeProduit();
$link = connectionBD();


mysqli_close($link);
?>