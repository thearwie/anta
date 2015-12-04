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
   include("produit.php");
   include("type_produit.php");
   $nbLigne = mysqli_num_rows($resultat);
   //$mesProduits = array();
   $mesProduits[$nbLigne] = new Produit();
   $iterateur = 0;
   while($row = mysqli_fetch_array($resultat, MYSQLI_BOTH))
   { 
      $produit = new Produit();
      $idTypeProduit = $row[7];
      $row2 = null;
      if($resultat2 = mysqli_query($link, "select * from type_produit where id = " . $idTypeProduit))
      {
        $row2 = mysqli_fetch_array($resultat2, MYSQLI_BOTH);
      }
      $mesProduits[$iterateur] = new Produit();
      $mesProduits[$iterateur]->init($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row2[0], $row2[1]);
      $iterateur ++;
   }
   mysqli_free_result($resultat2);
   mysqli_free_result($resultat);
   
   mysqli_close($link);
   
   return $mesProduits;
  }
}
   
 function afficherCollection($idTypeProduit)
 {
    $mesProduits = getAllProduit($idTypeProduit);
    $nbProduitSurLigne = 1;
    
    include("outil.php");
    
    echo "<div class='row'>";
    for($i=0; $i<count($mesProduits)-1; $i++) 
    {
      $nomDossier = $mesProduits[$i]->getTypeProduit()->getNom();
      $nomDossier = retirerApostrophe($nomDossier);
      $nomDossier = formaterTexte($nomDossier);
      $nomDossier = convertirMinuscule($nomDossier);
      
      echo "<div class='col-md-4'>";
      echo "<h2>" . $mesProduits[$i]->getNom() . "</h2>";
      echo "<img class='img-responsive img-produit' src='img/" . $nomDossier . "/" . $mesProduits[$i]->getId() . ".jpg' alt='" . $mesProduits[$i]->getId() . "'>";
      echo "<h3 class='prix'>" . number_format((float)$mesProduits[$i]->getPrix(), 2, '.', '') . " CAD$</h3>";
      echo "<button type='button' class='btn btn-primary bouton-detail' href='#'>Détails</button>";
      echo "</div>";
      
      if($nbProduitSurLigne == 3)
      {
        echo "</div>";
        echo "<div class='row'>";
        $nbProduitSurLigne = 1;
      }
      else if($nbProduitSurLigne == 3 && $i == count($mesProduits)-1)
      {
        echo "</div>";
      }
      else
      {
        $nbProduitSurLigne++;
      }
   }
}
?>