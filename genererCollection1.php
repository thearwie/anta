<?php
header('content-type:text/xml');

include("php/class/connexion_BD.php");

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

 if($resultat = mysqli_query($link, $sql)) {
   include("produit.php");
   $iterateur = 0;
   while($row = mysqli_fetch_array($resultat, MYSQLI_BOTH)) {
      $idTypeProduit = $row[7];
      $row2 = null;
      if($resultat2 = mysqli_query($link, "select * from type_produit where id = " . $idTypeProduit)) {
        $row2 = mysqli_fetch_array($resultat2, MYSQLI_BOTH);
      }
      $idProduit = $row[0];
      if(endsWith($idProduit, "1")) {
        if($resultat3 = mysqli_query($link, "select d.nom, pd.quantite from produit as p, produit_dimension as pd, dimension as d where p.id = pd.id_produit and d.id = pd.id_dimension and p.id = '" . $idProduit . "'")) {
          $row3 = null;
          $iterateur2 = 0;
       
          while($row3 = mysqli_fetch_array($resultat3, MYSQLI_BOTH)) {
            $dimension = new Dimension();
            $dimension->init($row3[0], $row3[1]);
            $quantitesProduit[$iterateur2] = $dimension;
            
            $iterateur2++;
            
            $quantiteTemps = $quantitesProduit;
            echo $quantiteTemps[$iterateur2]->getNom() . ", ";
            echo $quantiteTemps[$iterateur2]->getQuantite() . "<br/>";
          }
         }
        $produit = new Produit();
        $produit->init($idProduit, $row[1], $row[2], $row[3], $row[4], $row[5], $row2[0], $row2[1], $quantitesProduit);
        $mesProduits[$iterateur] = $produit;
        $iterateur++;
      }
   }
   mysqli_free_result($resultat3);
   mysqli_free_result($resultat2);
   mysqli_free_result($resultat);

   mysqli_close($link);

   return $mesProduits;
  }
}

include("outil.php");

 function envoyerProduits()
 {
    /* $xml = new DOMDocument('1.0', 'iso-8859-1'); */
    $xml = new DOMDocument('1.0', 'utf-8');
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
    echo $xml->saveXML();
}

envoyerProduits();
?>