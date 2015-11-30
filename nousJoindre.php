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
  
  $page = 'nousJoindre';
?>

<!-- VIEW -->

<?php include('/inc/header.php')?>
<div class='page'>

  <div class= "formulaireNousJoindre">
    <div class = "titreFormulaire">
      <span class="spanNousJoindre">Laissez-nous vous commentaires</span>	
    </div>
	<div class = "label">
      <span class="infoDetail">* Tous les champs sont obligatoires</span>
    </div>
	<div class="prenom">
	  <div class = "labelFormulaireNousJoindre">
      <span class="spanNousJoindre">Prénom</span>
    </div>	
    <div class = "input">
      <input type="text" id="txtPrenom" size="40" />
    </div>
	</div>
	<div class="nom">
		<div class = "labelFormulaireNousJoindre">
		  <span class="spanNousJoindre">Nom</span>
		</div>	
		<div class = "input">
		  <input type="text" id="txtNom" size="40" />
		</div>
	</div>
	<div class="courriel">
	  <div class = "labelFormulaireNousJoindre">
	    <span class="spanNousJoindre">Courriel</span>
      </div>	
	  <div class = "input">
		<input type="text" id="txtCourriel" size="40" />
	  </div>
	</div>
	<div class="message">
	  <div class = "labelFormulaireNousJoindre">
	    <span class="spanNousJoindre">Message</span>
      </div>	
	  <div class = "inputCommentaire">
        <textarea rows="8" cols= "60"></textarea>
      </div>
    </div>    
	  <div class = "buttonEnvoyer">
      <a class="button">Envoyer</a>
	  </div>
    </div>
  </div>
<?php include('/inc/footer.php')?>