<?php
include("connexion_BD.php");

function getAllTypeProduit()
{
  $link = connectionBD();

  if ($resultat = mysqli_query($link, "SELECT * FROM type_produit"))
  {
    include("type_produit.php");
    
    $iterateur = 0;
    while ($row = mysqli_fetch_array($resultat, MYSQLI_BOTH))
    {
      $typeProduit[$iterateur] = new TypeProduit();
      $typeProduit->printTypeProduit();
      $typeProduit[$iterateur]->initialiser($row[0], $row[1], $row[2]);
      $typeProduit->printTypeProduit();
      $iterateur ++;
    }
  }
  mysqli_close($link);
  return $typeProduit;
}
?>