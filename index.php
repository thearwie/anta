<!DOCTYPE html>
<!--
/*******************************************************************************************************/
/*                                                                                                     */
/*  Fichier....................:  index.php                                                            */
/*  Type.......................:  Document PHP                                                         */
/*  Titre......................:  Bijouterie Anta950                                                   */
/*  Auteurs....................:  ©Paola Marilu Carranza Gonzalez, 2015                                */
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

  $page = 'index';
?>

<!-- VIEW -->

<?php include('inc/header.php');?>
  <div class='page'>

    <div class = "ism-slider" data-play_type="loop" data-interval="8000">
      <ol>
          <li>
            <img src="img/banner/banner3.jpg" />
          </li>
          <li>
            <img src="img/banner/banner2.jpg" />
          </li>
          <li>
            <img src="img/banner/banner1.jpg" />
          </li>
      </ol>
    </div>

    <div class="detail">
    
      <div class="detailPageAccueilGauche">
        <div class = "descriptionGauche">
          <span class="infoLabel">Le nom de la compagnie «Anta 950» est inspiré de la langue quechua des anciens habitants du Pérou que signifie «argent». C'est justement l'argent qui vient de ce pays qui est utilisé comme matériel de base des plusieurs créations. </span>  
        </div>
        <div class="photoPrincipalGauche">
          <img id="imgPetite" src="img/accueil/pepites_argent.jpg"/>
        </div>
      </div>
      <div class="detailPageAccueilDroite">    
        <div class="photoPrincipalDroite">
          <img src="img/accueil/bracelet_bizantine.jpg"/>
        </div>
        <div class="descriptionDroite">
          <span class="infoLabel">Trouvez la création fait-main qui vous ressemble...</span>  
        </div>
  
      </div>
    </div>
  </div>
<?php include('inc/footer.php')?>