<!DOCTYPE html>
<!--
/*******************************************************************************************************/
/*                                                                                                     */
/*  Fichier....................:  produit_detail.php                                                   */
/*  Type.......................:  Document PHP                                                         */
/*  Titre......................:  Bijouterie Anta950                                                   */
/*  Auteurs....................:  ©Michaël Bilodeau, 2015                                			         */
/*  Date de création...........:  2015-12-01                                                           */
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

  $page = 'produit';
  
  
  
?>

<!-- VIEW -->

<?php include('/inc/header.php');?>
<div class='page'>
    
    <div class="detail-produit">
    
      <div class="row">
        <div class="col-sm-12 row-titre">
          <h1 id="titre-produit" class="titre-produit">Bracelet BR-0003</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div id="groupe-images" class="sp-wrap img-produit-detail">
            <!-- <img class="img-responsive img-produit-detail" src="img/bracelet/BR-0003-1.jpg" alt="BR-0003-1"> -->
            <!-- <div class=" img-produit-detail"> -->
              <a href="img/bracelet/BR-0001-1.jpg"><img class="img-responsive" src="img/bracelet/BR-0001-1.jpg" alt="BR-0001-1"></a>
              <a href="img/bracelet/BR-0003-1.jpg"><img class="img-responsive" src="img/bracelet/BR-0003-1.jpg" alt="BR-0003-1"></a>
              <a href="img/bracelet/BR-0007-1.jpg"><img class="img-responsive" src="img/bracelet/BR-0007-1.jpg" alt="BR-0007-1"></a>
            <!-- </div> -->
          </div>
        </div>
        <div class="col-md-8 info-produit">
        
          <div class="row row1-info-produit">
            <div class="col-sm-5">
              <label id="label-prix" class="col-gauche">22.75 CAD$</label>
            </div>
            <div class="col-sm-4">
              <label class="col-droite1">Ajouter au panier</label>
            </div>
            <div class="col-sm-2">
              <button class="row-col-droite2" type="button" onclick= "location = 'panier.php?id=BR-0003-1'"><img class="icon" src="img/icones/ajout_cart.png" /></button>
            </div>
            <div class="col-sm-1">
            </div>
          </div>
          
          <div class="row row2-info-produit">
            <div class="col-sm-5">
              <input id="input-quantite" class="quantite" type="number" name="quantity" value="0" min="0" max="5" />
            </div>
            <div class="col-sm-4">
              <label class="row2-col-droite">Ajouter à la liste de souhait</label>
            </div>
            <div class="col-sm-2">
              <button class="row2-col-droite2" type="button"><img class="icon" src="img/icones/ajout_wishlist.png"/></button>
            </div>
            <div class="col-sm-1">
            </div>
          </div>
          
          <div class="row row1-info-produit dimension">
            <div class="col-sm-5">
              <label class='col-gauche h3'>Dimension</label>
            </div>
            <div class="col-sm-7">
            </div>
          </div>
          
          <div class="row row-info-produit dimension">
            <div class="col-sm-5">
              <div class='col-xs-4 combobox-group-detail col-gauche'>
                <div class='combobox-taille'>
                  <select id="select-dimension" class='form-control' name='dimension' onchange='this.form.submit()'>
                    <option value=''>Choisir la dimension</option>
                    <option value='52'>52</option>
                    <option value='54'>54</option>
                    <option value='56'>56</option>
                  </select>
                </div>
              </div>
            </div>
            
            <div class="col-sm-4">
              <a id="lien-charte" class="col-droite col-charte" href="#">Charte de dimensions</a>
            </div>
            <div class="col-sm-3">
            </div>
          </div>
          
          <div class="row row-info-produit">
            <div class="col-sm-5">
              <label class="col-gauche">Disponibilié :</label>
            </div>
            <div class="col-sm-4">
              <label id="label-qty-restante" class="col-droite">2 bracelets restants</label>
            </div>
            <div class="col-sm-3">
            </div>
          </div>
          
          <div class="row row-info-produit">
            <div class="col-sm-5">
              <label class="col-gauche">Partager :</label>
            </div>
            <div class="col-sm-4">
              <div class="col-droite">
                <span class="st_facebook_large icone-partage" displayText="Facebook"></span>
                <span class="st_twitter_large icone-partage" displayText="Tweet"></span>
                <span class="st_pinterest_large icone-partage" displayText="Pinterest"></span>
              </div>
            </div>
            <div class="col-sm-3">
            </div>
          </div>
          
        </div>
        
      </div>
      
      <div class="row row-bas">
        <div class="col-md-4">
          <table class="table table-striped tableau-detail">
            <thead>
              <tr>
                <th colspan="2"><h3 class="titre-detail">Détails du produit</h3></th>
              </tr>
            </head>
            <tbody id="tab_detail">
              <tr>
                <td>Catégorie</td>
                <td id= "type-produit">Bracelet</td>
              </tr>
            </tbody>            
          </table>
        </div>
        <div class="col-md-8 autres-produits">
          <div class="row">
            <div class="col-sm-12">
              <h2 class="col-bas-droite">Autres produits</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3">
              <img id="autre-img1" class="img-autres-produits" src="img/bracelet/BR-0001-1.jpg" alt="BR-0001-1">
            </div>
            <div class="col-sm-3">
              <img id="autre-img2" class="img-autres-produits" src="img/bracelet/BR-0003-1.jpg" alt="BR-0003-1">
            </div>
            <div class="col-sm-3 img-3">
              <img id="autre-img3" class="img-autres-produits" src="img/bracelet/BR-0007-1.jpg" alt="BR-0007-1">
            </div>
            <div class="col-sm-3">
            </div>
          </div>
        </div>
      </div>
      
      
    </div>
    
</div>
<?php include('/inc/footer.php')?>

<script type="text/javascript" src="js/smoothproducts.min.js"></script>
<script>
  /* wait for images to load */
  $(window).load(function() {
    $('.sp-wrap').smoothproducts();
  });
</script>
<script src="js/produit.js" defer="defer"></script>