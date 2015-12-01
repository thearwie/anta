<?php
function connectionBD()
{
  $domainName = "webc.cegepsherbrooke.qc.ca";
  $userName = "viauma";
  $password = "rurove";
  $dbName = "viauma";

 $link = mysqli_connect($domainName, $userName, $password, $dbName);

 /* Vérification de la connexion */
 if (mysqli_connect_errno())
 {
   printf("Échec de la connexion : %s\n", mysqli_connect_error());
   exit();
 }
  return $link;
}

function getAllProduit($idTypeProduit = 0)
{
  $link = connectionBD();
  
  if($idTypeProduit == 0)
  {
    $sql = "select * from produit";
  }
  else
  {
    $sql = "select * from produit where id_type_produit = " . $idTypeProduit;
  }
  
 if($resultat = mysqli_query($link, $sql))
 { 
   include('/classe/produit.php');
   include('/classe/type_produit.php');
   $nbLigne = mysqli_num_rows($resultat);
   $mesProduits = array();
   while($row = mysqli_fetch_array($resultat, MYSQLI_BOTH))
   { 
      $produit = new Produit();
      $idTypeProduit = $row[7];
      if($resultat2 = mysqli_query($link, "select * from type_produit where id = " . $idTypeProduit))
      {
        $row2 = mysqli_fetch_array($resultat2, MYSQLI_BOTH);
      }
      $produit->init($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row2[0], $row2[1]);
      array_push($mesProduits, $produit);
   }
   mysqli_free_result($resultat);
   mysqli_free_result($resultat2);
   
   mysqli_close($link);
   
   return $mesProduits;
 }
}
   
 function afficherCollection($idTypeProduit)
 {
   $mesProduits = getAllProduit($idTypeProduit);
   
   $nbLigneParPage = 3;
   $nbProduitParLigne = 3;
   for($i=0; $i<$nbLigneParPage; $i++) 
   {
      echo "<div class='row'>";
      for($y=0; $y<$nbProduitParLigne; $y++)
      {
        $iterateur = 3 * $i + $y;
        echo "<div class='col-md-4'>";
        echo "<h2>" . $mesProduits[$iterateur]->getNom() . "</h2>";
        echo "<img class='img-responsive img-produit' src='img/" . strtolower($mesProduits[$iterateur]->getTypeProduit()->getNom()) . "/" . $mesProduits[$iterateur]->getId() . ".jpg' alt='" . $mesProduits[$iterateur]->getId() . "'>";
        echo "<h3 class='prix'>" . $mesProduits[$iterateur]->getPrix() . " CAD$</h3>";
        echo "<button type='button' class='btn btn-primary bouton-detail' href='#'>Détails</button>";
        echo "</div>";
      }
      echo "</div>";
   }
}
 ?>