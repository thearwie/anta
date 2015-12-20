<!DOCTYPE html>
<!--
/*******************************************************************************************************/
/*                                                                                                     */
/*  Fichier....................:  index.php                                                            */
/*  Type.......................:  Document PHP                                                         */
/*  Titre......................:  Bijouterie Anta950                                                   */
/*  Auteurs....................:  Paola Marilu Carranza Gonzalez, 2015                                 */
/*  Date de création...........:  2015-11-16                                                           */
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
  $page = 'creations';
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
      <div class='col-xs-8'>
      </div>
          
      <div class='col-xs-4 combobox-group'>
        <label class='control-label h3'>Catégorie</label>
        <div class='combobox'>
        <select class='form-control' id="select-categogie" name='categorie' onchange="afficherCreations();">
          <option value='nouv'>Nouveaute</option>
          <option value='pas_vente'>Produits plus en vente</option>
        </select>
       </div>
      </div>
    </div>
     
    <div class="collection-produit" id="creation-produit">
    </div>
    
  </div>
</div>
</div>

<script src="js/creation.js" defer="defer"></script>
<?php include('/inc/footer.php') ?>