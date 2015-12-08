<!DOCTYPE html>
<!--
/*******************************************************************************************************/
/*                                                                                                     */
/*  Fichier....................:  services.php                                                            */
/*  Type.......................:  Document PHP                                                         */
/*  Titre......................:  Bijouterie Anta950                                                   */
/*  Auteurs....................:  ©Paola Marilu Carranza Gonzalez, 2015                                */
/*  Date de création...........:  2015-11-16                                                           */
/*  Date de mise en production.:                                                                       */
/*                                                                                                     */
/*******************************************************************************************************/
/*                                                                                                     */
/*  - Page services                                                                                    */
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
   
     <form id="formulaireService" method="POST" enctype="multipart/form-data"  action = "model/envoyerInfoService.php" > 
   
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
           <select class = "selectService" name="selectService">
             <option class="optionSelectService" value="value1">Nettoyage</option> 
             <option class="optionSelectService" value="value2" selected>Fabrication à mesure</option>
           </select>
         </div>
         <div class="prenomService">
           <div class = "labelFormulaireServices">
             <span class="spanServices">Prénom</span>
           </div>	
           <div class = "input">
             <input type="text" id="txtPrenom" name="txtPrenom" size="40" />
           </div>
         </div>
       <div class="nomService">
           <div class = "labelFormulaireServices">
           <span class="spanServices">Nom</span>
         </div>	
         <div class = "input">
          <input type="text" id="txtNom" name="txtNom" size="40" />
         </div>
       </div>
       <div class="courrielService">
         <div class = "labelFormulaireServices">
           <span class="spanServices">Courriel</span>
           </div>	
         <div class = "input">
         <input type="text" id="txtCourriel" name="txtCourriel" size="40" />
         </div>
       </div>
       <div class="messageService">
         <div class = "labelFormulaireServices">
           <span class="spanServices">Message</span>
           </div>	
         <div class = "inputCommentaire">
             <textarea  id="txtAreaCommentaire" name="txtAreaCommentaire" rows="8" cols= "60"></textarea>
           </div>
         </div>    
       <div class = "buttonEnvoyer">
           <a class="button" href="javascript:{}" onclick = "if(formulaireComplet()){document.getElementById('formulaireService').submit();}" >Envoyer</a>
       </div>
       
	   </form>
   </div>
</div>

<script type="text/javascript">
  
  /*****************************************************************************/
  /* VARIABLES GLOBALES                                                        */
  /*****************************************************************************/
      var idControlInput = ['txtPrenom', 'txtNom', 'txtCourriel', 'txtAreaCommentaire']; 

      var nomChamp = ['Prénom', 'Nom', 'Courriel', 'Message' ]; 						 
	  
     /*=============================================================================*/
      function formulaireComplet()
      /*=============================================================================*/
      {
        var listeInputVide = 'Remplir le(s) champ(s):\n';	
        var flagVerifChampsVides = 0;
        var nombreControl = 0;
        var idControl = '';
		 
        for( nombreControl = 0; nombreControl < 4; nombreControl++)
        {
          if(document.getElementById(idControlInput[nombreControl]).value == '')  
          {	
            listeInputVide = listeInputVide + nomChamp[nombreControl] +'\n';
            flagVerifChampsVides = 1;
          }  
        }
		
        if (flagVerifChampsVides == 1)
        {
          alert(listeInputVide);
          nombreControl = 0;
		  
          while(document.getElementById(idControlInput[nombreControl]).value != '')
          {
            nombreControl++;
          }
          document.getElementById(idControlInput[nombreControl]).focus();
          return false;

        } 
        else
        {
           
           return true;
        }
        
      } 
  
</script>




<?php include('/inc/footer.php')?>