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

    <div class="detail">
            <div class="descriptionTroupe">
                <span class="infoLabel">Anta</span>
                <span class="infoData">
                </span>
            </div>

            <div class="photoPrincipalTroupe">
                <img src="img/accueil/bureau.jpg"/>
            </div>
    </div>
</div>
<?php include('inc/footer.php')?>