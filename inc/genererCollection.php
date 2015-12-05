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
   
 function envoyerProduits()
 {
    include("outil.php");
   
    header("Content-Type: text/xml");
    echo "<? xml version='1.0' encoding='UTF-8' standalone='yes' ?>\n";
    
    echo "<collection>\n";
    
      $idTypeProduit = $_GET["idTypeProduit"];
      $mesProduits = getAllProduit($idTypeProduit);
    
      for($i=0; $i<count($mesProduits)-1; $i++) 
      {
        $nomDossier = $mesProduits[$i]->getTypeProduit()->getNom();
        $nomDossier = retirerApostrophe($nomDossier);
        $nomDossier = formaterTexte($nomDossier);
        $nomDossier = convertirMinuscule($nomDossier);
        
        echo "<produit>\n";
        echo "<id>" . $mesProduits[$i]->getId() . "</id>\n";
        echo "<nom>" . $mesProduits[$i]->getNom() . "</nom>\n";
        echo "<sourceimage>img/" . $nomDossier . "/" . $mesProduits[$i]->getId() . ".jpg" . "</sourceimage>\n";
        echo "<prix>" . number_format((float)$mesProduits[$i]->getPrix(), 2, '.', '') . "</prix>\n";
        echo "</produit>\n";
      }
      
    echo "</collection>";
}
envoyerProduits();
?>