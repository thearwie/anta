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
  if($idTypeProduit == 0)
    $sql = "select * from produit";
  else
    $sql = "select * from produit where id_type_produit = " . $idTypeProduit;
  
 if($resultat = mysqli_query($link, $sql))
 { 
   include('/classe/produit.php');
   include('/classe/type_produit.php');
   $nbLigne = mysqli_num_rows($resultat);
   $mesProduits[$nbLigne] = new Produit();
   $iterateur = 0;
   while ($row = mysqli_fetch_array($resultat, MYSQLI_BOTH))
   { 
      $mesProduits[$iterateur] = new Produit();
      $idTypeProduit = $row[7];
      if($resultat2 = mysqli_query($link, "select * from type_produit where id = " . $idTypeProduit))
      {
        $row2 = mysqli_fetch_array($resultat2, MYSQLI_BOTH);
      }
      $mesProduits[$iterateur]->init($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row2[0], $row2[1]);
      $iterateur ++;
   }
   return $mesProduits;
 }
}
   
 function afficherCollection($idTypeProduit)
 {
   $mesProduits = getAllProduit($idTypeProduit);
  
   echo "<div class='collection'>";

   echo   "<div class='row'>";
   echo     "<div class='col-xs-4'>";
   echo     "</div>";
   echo     "<div class='col-xs-4 combobox-group'>";
   echo      "<label class='control-label h3'>Classement</label>";
   echo      "<div class='combobox'>";
   echo         "<select class='form-control' name='classement' onchange='this.form.submit()'>";
   echo           "<option value=''>Choisir un classement</option>";
   echo           "<option value='pop'>Popularité</option>";
   echo           "<option value='crois'>Prix - moins élevé au plus élevé</option>";
   echo           "<option value='dec'>Prix - plus élevé au moins élevé</option>";
   echo         "</select>";
   echo      "</div>";
   echo   "</div>";
      
   echo   "<div class='col-xs-4 combobox-group'>";
   echo     "<label class='control-label h3'>Catégorie</label>";
   echo     "<div class='combobox'>";
   echo       "<select class='form-control' name='categorie' onchange='this.form.submit()'>";
   echo         "<option value='tout'>Tous les produits</option>";
   echo         "<option value='ba'>Bague (BA)</option>";
   echo         "<option value='bo'>Boucle d\'oreille (BO)</option>";
   echo         "<option value='br'>Bracelet (BR)</option>";
   echo         "<option value='co'>Collier (CO)</option>";
   echo       "</select>";
   echo     "</div>";
   echo   "</div>";
   echo   "</div>";
   
   $nbLigneParPage = 3;
   $nbProduitParLigne = 3;
   for($i=0; $i<$nbLigneParPage; $i++) 
   {
      echo "<div class='row'>";
      for($y=0; $y<$nbProduitParLigne; $y++)
      {
        $iterateur = 3 * $i + $y;
        echo "<div class='col-md-4'>";
        echo    "<h2>" . $mesProduits[$iterateur]->getNom() . "</h2>";
        echo    "<img class='img-responsive img-produit' src='img/" . strtolower($mesProduits[$iterateur]->getTypeProduit()->getNom()) . "/" . $mesProduits[$iterateur]->getId() . ".jpg' alt='" . $mesProduits[$iterateur]->getId() . "'>";
        echo    "<h3 class='prix'>" . $mesProduits[$iterateur]->getPrix() . " CAD$ </h3>";
        echo    "<button type='button' class='btn btn-primary bouton-detail' href='#'>Détails</button>";
        echo "</div>";
      }
      echo "</div>";
   }
    echo "</div>";
    
   mysqli_free_result($result);
  
   mysqli_close($link);
}
 ?>