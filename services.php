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
  
  $page = 'services';
  
?>

<!-- VIEW -->

<?php include('/inc/header.php')?>
<div class='page'>
   <div class= "formulaireServices">
     <div class = "titreFormulaire">
       <span class="spanServices">Service</span>	
     </div>
     <div class="informationFormulaire">
       <span class="spanServicesInformation">La bijouterie Anta950 offre des services de nettoyage et fabrication de bijoux à mésure (juste pour les produits qui se trouvent dans le catalogue)</span>	
     </div>
	   <div class="typeService">
	     <div class = "labelFormulaireServices">
	       <span class="spanServices">Type de service</span>
	     </div>	
	     <select class = "selectService" name="select">
         <option class="optionSelectService" value="value1">Nettoyage</option> 
         <option class="optionSelectService" value="value2" selected>Fabrication à mesure</option>
       </select>
     </div>
	   <div class="prenomService">
	     <div class = "labelFormulaireServices">
         <span class="spanServices">Prénom</span>
       </div>	
       <div class = "input">
         <input type="text" id="txtPrenom" size="40" />
       </div>
	   </div>
	 <div class="nomService">
       <div class = "labelFormulaireServices">
	     <span class="spanServices">Nom</span>
	   </div>	
	   <div class = "input">
		  <input type="text" id="txtNom" size="40" />
	   </div>
	 </div>
	 <div class="courrielService">
	   <div class = "labelFormulaireServices">
	     <span class="spanServices">Courriel</span>
       </div>	
	   <div class = "input">
		 <input type="text" id="txtCourriel" size="40" />
	   </div>
	 </div>
	 <div class="messageService">
	   <div class = "labelFormulaireServices">
	     <span class="spanServices">Message</span>
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