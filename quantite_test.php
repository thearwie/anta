<?php 
ini_set("display_errors", 1);
include("produit.php");
  
function connectionBD()
{
  $domainName = "webc.cegepsherbrooke.qc.ca";
  $userName = "viauma";
  $password = "rurove";
  $dbName = "viauma";

  $link = mysqli_connect($domainName, $userName, $password, $dbName);

  if (mysqli_connect_errno()) {
    printf("Échec de la connexion : %s\n", mysqli_connect_error());
    exit();
  }
  return $link;
}

function getProduit($idProduit) {
  $link = connectionBD();
  
  print_r($idProduit . "<br/>");
  
  $sql = "select d.nom, pd.quantite from produit as p, produit_dimension as pd, dimension as d where p.id = pd.id_produit and d.id = pd.id_dimension and p.id = '" . $idProduit . "'";
  
  if($resultat = mysqli_query($link, $sql)) {
    $iterateur = 0;
 
    while($row = mysqli_fetch_array($resultat, MYSQLI_BOTH)) {
      
      /*$mesProduits[$iterateur] = new Produit();
      $mesProduits[$iterateur]->init($idProduit, $row[1], $row[2], $row[3], $row[4], $row[5], $row2[0], $row2[1], $quantitesProduit);
      $iterateur++;
      */
      
      //$quantitesProduit[$iterateur] = new Dimension();
      $dimension = new Dimension();
      $dimension->init($row[0], $row[1]); 
      $quantitesProduit[$iterateur] = $dimension;
      
      $iterateur++;
    }
   }
   
   mysqli_free_result($resultat);
   mysqli_close($link);
   
   for($i=0; $i<count($quantitesProduit)-1; $i++) {
    echo $quantitesProduit[$i]->getNom() . " ";
    echo $quantitesProduit[$i]->getQuantite() . "<br/>";
  }
   
   $produit = new Produit();
   $quantitesTemp = $quantitesProduit;
   $produit->init($idProduit, "Bague BA-0001", 35.75, "Une bague en argent.", 1, 0, 1, "Bague", $quantitesTemp);
   
   return $produit;
}

$produit = getProduit("BA-0001-1");
echo "<p>";
  echo $produit->getId() . "<br/>";
  echo $produit->getNom() . "<br/>";
  echo $produit->getPrix() . "<br/>";
  echo $produit->getCommentaire() . "<br/>";
  echo $produit->getEnVente() . "<br/>";
  echo $produit->getNouveaute() . "<br/>";
  echo $produit->getTypeProduit()->getId() . "<br/>";
  echo $produit->getTypeProduit()->getNom() . "<br/>";
  
  $produitTemp2 = $produit->getDimension();
  for($i=0; $i<count($produitTemp2); $i++) {
    echo $produitTemp2[$i]->getNom() . " ";
    echo $produitTemp2[$i]->getQuantite() . "<br/>";
  }
  echo "<br/>";
echo "</p>";
?>