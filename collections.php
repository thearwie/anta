<!DOCTYPE html>
<!--
/*******************************************************************************************************/
/*                                                                                                     */
/*  Fichier....................:  collections.php                                                      */
/*  Type.......................:  Document PHP                                                         */
/*  Titre......................:  Bijouterie Anta950                                                   */
/*  Auteurs....................:  ©Michaël Bilodeau, 2015                                			   */
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
            <img src="img/banner/banner1.jpg" alt="banner1.jpg"/>
          </li>
          <li>
            <img src="img/banner/banner2.jpg" alt="banner2.jpg"/>
          </li>
          <li>
            <img src="img/banner/banner3.jpg" alt="banner3.jpg"/>
          </li>
      </ol>
    </div>
    
  <div class='collection'>

     <div class='row'>
        <div class='col-xs-4'>
        </div>
        <div class='col-xs-4 combobox-group'>
          <label class='control-label h3'>Classement</label>
          <div class='combobox'>
          <select class='form-control' id="select-classement" name='classement'>
            <option value=''>Choisir un classement</option>
            <option value='pop'>Popularité</option>
            <option value='crois'>Prix - moins élevé au plus élevé</option>
            <option value='dec'>Prix - plus élevé au moins élevé</option>
          </select>
          </div>
       </div>
          
       <div class='col-xs-4 combobox-group'>
        <label class='control-label h3'>Catégorie</label>
        <div class='combobox'>
        <select class='form-control' id="select-categogie" name='categorie' onchange="afficherProduits();">
          <option value='tout'>Tous les produits</option>
          <option value='ba'>Bague (BA)</option>
          <option value='bo'>Boucle d'oreille (BO)</option>
          <option value='br'>Bracelet (BR)</option>
          <option value='co'>Collier (CO)</option>
        </select>
       </div>
      </div>
    </div>
     
    <div class="collection-produit" id="collection-produit" onload="afficherProduits()">
    </div>
    
  </div>
</div>
<?php include('/inc/footer.php')?>

<script src="js/collection.js" defer="defer"></script>

<!-- <script> -->
  /* function afficherProduits(idTypeProduit) {
    var xmlhttp;
    if (idTypeProduit == -1) {
      document.getElementById("collection-produit").innerHTML = "";
      return;
    }
    else {
      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
      }
      else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          document.getElementById("collection-produit").innerHTML = xmlhttp.responseText;
        }
      };
      
    xmlhttp.open("GET", "genererCollection.php?idTypeProduit=" + idTypeProduit, true);
    xmlhttp.send();
   }
  } */
<!-- </script> -->