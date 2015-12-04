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
          <select class='form-control' name='classement' onchange='this.form.submit()'>
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
        <select class='form-control' name='categorie' onchange='this.form.submit()'>
          <option value='tout'>Tous les produits</option>
          <option value='ba'>Bague (BA)</option>
          <option value='bo'>Boucle d'oreille (BO)</option>
          <option value='br'>Bracelet (BR)</option>
          <option value='co'>Collier (CO)</option>
        </select>
       </div>
      </div>
    </div>
     
    <div class="collection-produit">
      <?php 
      include("genererCollection.php");
      afficherCollection(0);
      ?>
    </div>
  </div>
</div>
<?php include('/inc/footer.php')?>