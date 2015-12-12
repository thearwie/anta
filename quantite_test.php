<?php
include("dimension.php");
include("type_produit.php");
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
  
  echo "Test 1 </br>";

  $sql = "select d.nom, pd.quantite from produit as p, produit_dimension as pd, dimension as d where p.id = pd.id_produit and d.id = pd.id_dimension and p.id = '" . $idProduit . "'";
  
  if($resultat = mysqli_query($link, $sql)) {
    $nbLigne = mysqli_num_rows($resultat);
    $quantitesProduit[$nbLigne] = new Dimension();
    $iterateur = 0;
    echo "Test 2 </br>";
 
    while($row = mysqli_fetch_array($resultat, MYSQLI_BOTH)) {
      $quantitesProduit[$iterateur] = new Dimension();
      $quantitesProduit[$iterateur]->init($row[0], $row[1]);
      $iterateur++;
      echo "Test 3 </br>";
    }
   }
   mysqli_free_result($resultat);
   mysqli_close($link);
   
   $produit = new Produit();
   $produit->init($idProduit, "Bague BA-0001", 35.75, "Une bague en argent.", 1, 0, 1, "Bague", $quantitesProduit);
   echo "Test 4 </br>";

   return $produit;
}
  
echo "Test 5 </br>";
$produit = getProduit("BA-0001-1");
echo "Test 6 </br>";
echo "<p>";
  echo "Test 7 </br>";
  echo $produit->getId() . "<br/>";
  echo $produit->getNom() . "<br/>";
  echo $produit->getPrix() . "<br/>";
  echo $produit->getCommentaire() . "<br/>";
  echo $produit->getEnVente() . "<br/>";
  echo $produit->getNouveaute() . "<br/>";
  echo $produit->getTypeProduit()->getId() . "<br/>";
  echo $produit->getTypeProduit()->getNom() . "<br/>";
  /*for($i=0; $i<count($produit->getDimension())-1; $i++) {
    echo $produit->getDimension()[$i]->getNom() . " ";
    echo $produit->getDimension()[$i]->getQuantite() . "<br/>";
  }*/
  echo "<br/>";
echo "</p>";
echo "Test 8 </br>";
?>