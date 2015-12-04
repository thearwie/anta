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

function getProduit()
{  
 $link = connectionBD();
 include("type_produit.php");
 include("produit.php");
 if($resultat = mysqli_query($link, "select * from produit where id = 'BA-0001-1'"))
 { 
   $nbLigne = mysqli_num_rows($resultat);
   $produit = new Produit();
   if($row = mysqli_fetch_array($resultat, MYSQLI_BOTH))
   { 
       
      $produit->setId($row[0]);      
      $produit->setNom($row[1]);      
      $produit->setQuantite($row[2]);      
      $produit->setPrix($row[3]);      
      $produit->setCommentaire($row[4]);
      $produit->setEnvente($row[5]);
      $produit->setNouveaute($row[6]);
      
      if($resultat2 = mysqli_query($link, "select * from type_produit where id = " . $row[7]))
      {
        $row2 = mysqli_fetch_array($resultat2, MYSQLI_BOTH);
        $produit->setTypeProduit($row2[0], $row2[1]);
      }
      echo "ID:                     " . $row[0] . "<br/>";
      echo "Nom:                    " . $row[1] . "<br/>";
      echo "Quantité:               " . $row[2] . "<br/>";
      echo "Prix:                   " . $row[3] . "<br/>";
      echo "Commentaire:            " . $row[4] . "<br/>";
      echo "En vente?:              " . $row[5] . "<br/>";
      echo "Nouveauté?:             " . $row[6] . "<br/>";
      echo "ID du type de produit:  " . $row[7] . "<br/>";
      echo "Nom du type de produit: " . $produit->getTypeProduit()->getNom()  . "<br/>";
      
      echo "ID:                     " . $produit->getId()                     . "<br/>";
      echo "Nom:                    " . $produit->getNom()                    . "<br/>";
      echo "Quantité:               " . $produit->getQuantite()               . "<br/>";
      echo "Prix:                   " . $produit->getPrix()                   . "<br/>";
      echo "Commentaire:            " . $produit->getCommentaire()            . "<br/>";
      echo "En vente?:              " . $produit->getEnVente()                . "<br/>";
      echo "Nouveauté?:             " . $produit->getNouveaute()              . "<br/>";
      echo "ID du type de produit:  " . $produit->getTypeProduit()->getId()   . "<br/>";
      echo "Nom du type de produit: " . $produit->getTypeProduit()->getNom()  . "<br/>";
   }
   mysqli_free_result($resultat);
   
   mysqli_close($link);   
 }
}
  getProduit();
 
 ?>