<!DOCTYPE html>
<!--
/*******************************************************************************************************/
/*                                                                                                     */
/*  Fichier....................:  collections.php                                                      */
/*  Type.......................:  Document PHP                                                         */
/*  Titre......................:  Bijouterie Anta950                                                   */
/*  Auteurs....................:  ©Michaël Bilodeau, 2015                                			         */
/*  Date de création...........:  2015-11-19                                                           */
/*  Date de mise en production.:                                                                       */
/*                                                                                                     */
/*******************************************************************************************************/
/*                                                                                                     */
/*  - Page principale du site                                                                          */
/*                                                                                                     */
/*******************************************************************************************************/
-->
<!-- CONTROLLER -->
<?php

  $page = 'collections';
?>

<!-- VIEW -->

<?php include('/inc/header.php');?>
<div class='page'>

    <div class = "ism-slider" data-play_type="loop" data-interval="8000">
      <ol>
          <li>
            <img src="img/banner/banner1.jpg">
          </li>
          <li>
            <img src="img/banner/banner2.jpg">
          </li>
          <li>
            <img src="img/banner/banner1.jpg">
          </li>
      </ol>
    </div>
    
<?php
 $domainName = "webc.cegepsherbrooke.qc.ca";
 $userName = "viauma";
 $password = "rurove";
 $dbName = "viauma";

 $test = 0;
 $link = mysqli_connect($domainName, $userName, $password, $dbName);

 /* Vérification de la connexion */
 if (mysqli_connect_errno())
 {
   printf("Échec de la connexion : %s\n", mysqli_connect_error());
   exit();
 }

 if ($resultat = mysqli_query($link, "select * from produit"))
 { 
   include("classe/produit.php");
   $nbLigne = mysqli_num_rows($resultat);
   $mesProduits[nbLigne] = new Produit();
   $iterateur = 0;
   while ($row = mysqli_fetch_array($resultat, MYSQLI_BOTH))
   { 
      $mesProduits[$iterateur] = new Produit();
      $mesProduits[$iterateur]->init($row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);
      $iterateur ++;
   } 
   
   echo "<form id='form_affiches' action='production_detaillee.php' method='post'>";

   for($i=$nbLigne-1; $i>=0; $i--) 
   { 
      $value = $mesProductions[$i]->getId();
      echo "<input class='img_affiche' type='image' name='id' src='img/" . $mesProductions[$i]->getSrcImage() . "' alt='Affiche de production' onclick='submit' value='$value'/>";
   }
    echo "</form>";
    mysqli_free_result($result);
  }
  
   mysqli_close($link);
   
 ?>
	
	<div class="collection">
      <div class="row">
        <div class="col-xs-4">
        </div>
        <div class="col-xs-4 combobox-group">
            <label class="control-label h3">Classement</label>
            <div class="combobox">
                <select class="form-control" name="classement" onchange="this.form.submit()">
                    <option value="">Choisir un classement</option>
                    <option value="pop">Popularité</option>
                    <option value="crois">Prix - moins élevé au plus élevé</option>
                    <option value="dec">Prix - plus élevé au moins élevé</option>
                </select>
              </div>
          </div>
      
        <div class="col-xs-4 combobox-group">
            <label class="control-label h3">Catégorie</label>
            <div class="combobox">
                <select class="form-control" name="categorie" onchange="this.form.submit()">
                    <option value="tout">Tous les produits</option>
                    <option value="ba">Bague (BA)</option>
                    <option value="bo">Boucle d'oreille (BO)</option>
                    <option value="br">Bracelet (BR)</option>
                    <option value="co">Collier (CO)</option>
                </select>
              </div>
          </div>
      </div>
  
      <!-- Projects Row -->
      <div class="row">
          <div class="col-md-4 portfolio-item produit">
              <h2>Bague BA-0001</h2>
              <img class="img-responsive img-produit" src="img/bague/BA-0001-1.jpg" alt="BA-0001-1">
              <h3 class="prix">15,00 CAD$</h3>
              <button type="button" class="btn btn-primary bouton-detail" href="#">Détails</button>
          </div>
          <div class="col-md-4 portfolio-item produit">
              <h2>Boucle d'oreille BO-0002</h2>
              <img class="img-responsive img-produit" src="img/boucleOreille/BO-0002-1.jpg" alt="BO-0002-1">
              <h3 class="prix">15,00 CAD$</h3>
              <button type="button" class="btn btn-primary bouton-detail" href="#">Détails</button>
          </div>
          <div class="col-md-4 portfolio-item produit">
              <h2>Boucle d'oreille BO-0003</h2>
              <img class="img-responsive img-produit" src="img/boucleOreille/BO-0003-1.jpg" alt="BO-0003-1">
              <h3 class="prix">15,00 CAD$</h3>
              <button type="button" class="btn btn-primary bouton-detail" href="#">Détails</button>
          </div>
      </div>
      <!-- /.row -->

      <!-- Projects Row -->
      <div class="row">
          <div class="col-md-4 portfolio-item produit">
              <h2>Bracelet BR-0007</h2>
              <img class="img-responsive img-produit" src="img/bracelet/BR-0007-1.jpg" alt="BR-0007-1">
              <h3 class="prix">15,00 CAD$</h3>
              <button type="button" class="btn btn-primary bouton-detail" href="#">Détails</button>
          </div>
          <div class="col-md-4 portfolio-item produit">
              <h2>Bracelet BR-0003</h2>
              <img class="img-responsive img-produit" src="img/bracelet/BR-0003-1.jpg" alt="BR-0003-1">
              <h3 class="prix">15,00 CAD$</h3>
              <button type="button" class="btn btn-primary bouton-detail" href="#">Détails</button>
          </div>
          <div class="col-md-4 portfolio-item produit">
              <h2>Collier CO-0001</h2>
              <img class="img-responsive img-produit" src="img/collier/CO-0001-1.jpg" alt="CO-0001-1">
              <h3 class="prix">15,00 CAD$</h3>
              <button type="button" class="btn btn-primary bouton-detail" href="#">Détails</button>
          </div>
      </div>

      <!-- Projects Row -->
      <div class="row">
          <div class="col-md-4 portfolio-item produit">
              <h2>Bracelet BR-0001</h2>
              <img class="img-responsive img-produit" src="img/bracelet/BR-0001-1.jpg" alt="BR-0001-1">
              <h3 class="prix">15,00 CAD$</h3>
              <button type="button" class="btn btn-primary bouton-detail" href="#">Détails</button>
          </div>
          <div class="col-md-4 portfolio-item produit">
              <h2>Bracelet BR-007</h2>
              <img class="img-responsive img-produit" src="img/bracelet/BR-0007-1.jpg" alt="BR-0007-1">
              <h3 class="prix">15,00 CAD$</h3>
              <button type="button" class="btn btn-primary bouton-detail" href="#">Détails</button>
          </div>
          <div class="col-md-4 portfolio-item produit">
              <h2>Bracelet BR-0003</h2>
              <img class="img-responsive img-produit" src="img/bracelet/BR-0003-1.jpg" alt="BR-0003">
              <h3 class="prix">15,00 CAD$</h3>
              <button type="button" class="btn btn-primary bouton-detail" href="#">Détails</button>
          </div>
      </div>
      <!-- /.row -->

      <hr/>

      <!-- Pagination -->
      <div class="row text-center">
          <div class="col-lg-12">
              <ul class="pagination">
                  <li>
                      <a href="#">&laquo;</a>
                  </li>
                  <li class="active page-active">
                      <a href="#">1</a>
                  </li>
                  <li>
                      <a href="#">2</a>
                  </li>
                  <li>
                      <a href="#">3</a>
                  </li>
                  <li>
                      <a href="#">4</a>
                  </li>
                  <li>
                      <a href="#">5</a>
                  </li>
                  <li>
                      <a href="#">&raquo;</a>
                  </li>
              </ul>
          </div>
      </div>
      <!-- /.row -->
    </div>
</div>
<?php include('/inc/footer.php')?>