<?php
header('content-type:text/xml');

include("php/accesBD/connexion_BD.php");
include("outil.php");
include("produit.php");

function getDetailsProduit($idProduit)
{
  $link = connectionBD();

  $sqlProduit = "select p.id, p.nom, p.prix, p.en_vente, p.nouveaute, tp.id, tp.nom "
              . "from produit as p,"
              . "type_produit as tp "
              . "where tp.id = p.id_type_produit "
              . "and p.id like '%" . $idProduit . "%'";

 if($resultat = mysqli_query($link, $sqlProduit)) {
   $iterateur = 0;
   
   while($row = mysqli_fetch_array($resultat, MYSQLI_BOTH)) {
      $idProduitComplet = $row[0];
      if(endsWith($idProduitComplet, "1")) {
        $sqlDimension = "";
        if($resultat2 = mysqli_query($link, "select d.nom, pd.quantite from produit as p, produit_dimension as pd, dimension as d where p.id = pd.id_produit and d.id = pd.id_dimension and p.id = '" . $idProduitComplet . "'"))
        {
          $row2 = null;
          $iterateur2 = 0;
       
          while($row2 = mysqli_fetch_array($resultat2, MYSQLI_BOTH)) {
            $dimension = new Dimension();
            $dimension->init($row2[0], $row2[1]);
            $quantitesProduit[$iterateur2] = $dimension;
			
            $iterateur2++;
          }
         }
         
        $sqlAttribut = "select ta.nom, pta.valeur, u.nom, ta.description"
                     . "from produit as p, "
                     . "produit_type_attribut as pta, "
                     . "type_attribut as ta, "
                     . "unite as u "
                     . "where p.id = pta.id_produit "
                     . "and pta.id_type_attribut = ta.id "
                     . "and u.id = ta.id_unite "
                     . "and p.id = '" . $idProduitComplet . "'";
        if($resultat3 = mysqli_query($link, $sqlAttribut)) {
          $row3 = null;
          $iterateur3 = 0;
          
          while($row3 = mysqli_fetch_array($resultat3, MYSQLI_BOTH)) {
            $attribut = new Attribut();
            $attribut->init($row3[0], $row3[1], $row3[2], $row3[3]);
            $attributsProduit[$iterateur3] = $attribut;
			
            $iterateur3++;
          }
        }
        
        $nomsAutresProduits = retournerNomsAutresProduits($row[6], $idProduitComplet);
      }
      $nomImage = $row[6];
      $nomImage = retirerApostrophe($nomImage);
      $nomImage = formaterTexte($nomImage);
      $nomImage = convertirMinuscule($nomImage);
      $nomImage = "img/" . $nomImage . "/" . $idProduitComplet . ".jpg"
      
      $nomsImages[$iterateur] = $nomImage;
      
      $iterateur++;
   }
  $produit = new Produit();
  $produit->initialiser($idProduit, $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $quantitesProduit, $attributsProduit, $nomsImages, $nomsAutresProduits);

  mysqli_free_result($resultat3);
  mysqli_free_result($resultat2);
  mysqli_free_result($resultat);

  mysqli_close($link);
   
  return $produit;
  }
}

function retournerNomsAutresProduits($idTypeProduit, $idProduit)
{  
  $sql = "select p.id, p.id_type_produit,  tp.nom from produit as p, type_produit as tp "
       . "where tp.id = p.id_type_produit "
       . "order by case when id_type_produit = " . $idTypeProduit . " then 1 else 2 end, p.nom";
     
  $nbProduits = 0;
  
  if($resultat = mysqli_query($link, $sql)) {
   $iterateur = 0;
   
    while($row = mysqli_fetch_array($resultat, MYSQLI_BOTH) && nbProduits < 3) {
      if($row[0] != $idProduit)
      {
        $nomImageAutreProduit = $row[2];
        $nomImageAutreProduit = retirerApostrophe($nomImageAutreProduit);
        $nomImageAutreProduit = formaterTexte($nomImageAutreProduit);
        $nomImageAutreProduit = convertirMinuscule($nomImageAutreProduit);
        $nomImageAutreProduit = "img/" . $nomImageAutreProduit . "/" . $row[0] . ".jpg"
        $nomsProduit[$iterateur] = $nomImageAutreProduit;
        
        $nbProduits++;
        $iterateur++;
      }
    }
  }
  
  mysqli_free_result($resultat);
  
  if($nbProduits == 0)
  {
    return "Aucun autre produit dans le système."
  }
  else
  {
    return $nomsProduit;
  }
}

function afficherDetailsProduit()
{
  $idProduit = $_GET["idProduit"];
  $produit = getDetailsProduit($idProduit);
  
  $xml = new DOMDocument('1.0', 'iso-8859-1');
	$xml->formatOutput = true;
  
  $baliseProduit = $xml->createElement("produit");
	$xml->appendChild($baliseProduit);
  
  $nom = $xml->createElement("nom", $produit->getNom());
  $baliseProduit->appendChild($nom);
  
  $typeProduit = $xml->createElement("typeproduit", $produit->getTypeProduit()->getNom());
  $baliseProduit->appendChild($typeProduit);
  
  $images = $xml->createElement("images");
  for($i = 0; $i < count($produit->getNomImages()); $i++)
  {
    $image = $xml->createElement("image", $produit->getNomImages()[$i]);
    $images->appendChild($image);
  }
  $baliseProduit->appendChild($images);
  
  $prix = $xml->createElement("prix", number_format((float)$produit->getPrix(), 2, '.', '') . " CDN$");
  $baliseProduit->appendChild($prix);
  
  $dimensions = $xml->createElement("dimensions");
  for($x = 0; $x < count($produit->getDimension()); $x++)
  {
    $dimension = $xml->createElement("dimension");
    
    $nomDimension = $xml->createElement("nomdimension", $produit->getDimension[$x]->getNom());
    $dimension->appendChild($nomDimension);
    
    $quantite = $xml->createElement("quantite", $produit->getDimension()[$x]->getQuantite());
    $dimension->appendChild($quantite);
    
    $dimensions->appendChild($dimension);
  }
  $baliseProduit->appendChild($dimensions);
  
  $details = $xml->createElement("details");
  for($y = 0; $y < count($produit->getAttribut()); $y++)
  {
    $attribut = $xml->createElement("attribut");
    
    $nomAttribut = $xml->createElement("nomattribut", $produit->getAttribut()[$y]->getNom());
    $attribut->appendChild($nomAttribut);
    
    $valeur = $xml->createElement("valeur", $produit->getAttribut()[$y]->getValeur());
    $attribut->appendChild($valeur);
    
    $unite = $xml->createElement("unite", $produit->getAttribut()[$y]->getUnite());
    $attribut = $xml->appendChild($unite);
    
    $description = $xml->createElement("description", $produit->getAttribut()[$y]->getDescription());
    $attribut->appendChild($description);
    
    
    $details = $xml->appendChild($attribut);
  }
  $baliseProduit->appendChild($details);
  
  $autresImages = $xml->createElement("autresimages");
  for($it = 0; $it < count($produit->getNomAutresImages()); $it++)
  {
    $autreImage = $xml->createElement("autreimage", $produit->getNomAutresImages()[$it]);
    $autresImages->appendChild($autreImage);
  }
  $baliseProduit->appendChild($autresImages);
  
  echo $xml->saveXML();
}

afficherDetailsProduit();
?>