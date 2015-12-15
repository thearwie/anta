<?php
header('Content-type: text/xml');

include("outil.php");
include("connexion_BD.php");

function getAllProduit($idClassement, $idTypeProduit)
{
  $link = connectionBD();
  
  if($idTypeProduit == 0) {
    switch($idClassement)
    {
      case 0:
      $sql = "select * from produit order by nom";
      break;
      
      case 1:
      $sql = "select * from produit order by prix asc";
      break;
      
      case 2:
      $sql = "select * from produit order by prix desc";
      break;
    } 
  } else {
    switch($idClassement)
    {
      case 0:
      $sql = "select * from produit where id_type_produit = " . $idTypeProduit . " order by nom";
      break;
      
      case 1:
      $sql = "select * from produit where id_type_produit = " . $idTypeProduit . " order by prix asc";
      break;
      
      case 2:
      $sql = "select * from produit where id_type_produit = " . $idTypeProduit . " order by prix desc";
      break;
    } 
  }
  
 if($resultat = mysqli_query($link, $sql))
 { 
   include("produit.php");
   include("type_produit.php");
   $nbLigne = mysqli_num_rows($resultat);
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
      if(endsWith($row[0], "1"))
      {
        $mesProduits[$iterateur] = new Produit();
        $mesProduits[$iterateur]->init($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row2[0], $row2[1]);
        $iterateur ++;
      }
   }
   mysqli_free_result($resultat2);
   mysqli_free_result($resultat);
   
   mysqli_close($link);
   
   return $mesProduits;
  }
}
   
 function envoyerProduits()
 {
    $xml = new DomDocument("1.0");
    $xml->formatOutput = true;    
    
    $collection = $xml->createElement("collection");
    $xml->appendChild($collection);
    
    $idTypeProduit = $_GET["idTypeProduit"];
    $idClassement  = $_GET["idClassement"];
    $mesProduits = getAllProduit($idClassement, $idTypeProduit);
  
    for($i=0; $i<count($mesProduits)-1; $i++) 
    {
      $nomDossier = $mesProduits[$i]->getTypeProduit()->getNom();
      $nomDossier = retirerApostrophe($nomDossier);
      $nomDossier = formaterTexte($nomDossier);
      $nomDossier = convertirMinuscule($nomDossier);
      
      $produit = $xml->createElement("produit");
      $collection->appendChild($produit);
      
      $id = $xml->createElement("id", $mesProduits[$i]->getId());
      $produit->appendChild($id);
      
      $idproduit = $xml->createElement("idproduit", substr($mesProduits[$i]->getId(), 0, strrpos($mesProduits[$i]->getId(), "-")));
      $produit->appendChild($idproduit);
      
      $nom = $xml->createElement("nom", $mesProduits[$i]->getNom());
      $produit->appendChild($nom);
      
      $sourceimage = $xml->createElement("sourceimage", "img/" . $nomDossier . "/" . $mesProduits[$i]->getId() . ".jpg");
      $produit->appendChild($sourceimage);
      
      $prix = $xml->createElement("prix", number_format((float)$mesProduits[$i]->getPrix(), 2, '.', '') . " CDN$");
      $produit->appendChild($prix);
    }
    
    if($idTypeProduit > 0)
      $nomFichier = "collection" . $idTypeProduit. ".xml";
    else
      $nomFichier = "collection.xml";
    
    /* $xml->save($nomFichier); */
    echo $xml;
    /* $file = file_get_contents($nomFichier);
    echo $file;$file = file_get_contents($nomFichier);
    echo $file; */
}

envoyerProduits();
?>