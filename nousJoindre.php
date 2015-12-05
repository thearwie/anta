<!DOCTYPE html>
<!--
/*******************************************************************************************************/
/*                                                                                                     */
/*  Fichier....................:  nousJoindre.php                                                      */
/*  Type.......................:  Document PHP                                                         */
/*  Titre......................:  Bijouterie Anta950                                                   */
/*  Auteurs....................:  ©Paola Marilu Carranza Gonzalez, 2015                                */
/*  Date de création...........:  2015-11-16                                                           */
/*  Date de mise en production.:                                                                       */
/*                                                                                                     */
/*******************************************************************************************************/
/*                                                                                                     */
/*  - Page nous joindre                                                                                */
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
  
    <form id="formulaireNousJoindre" method="POST" action = "model/envoyerInfoNousJoindre.php" > 
    
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
          <textarea id="txtAreaCommentaire"  rows="8" cols= "60"></textarea>
        </div>
      </div>    
      <div class = "buttonEnvoyer">
        <a class="button" href="javascript:{}" onclick = "if(formulaireComplet()){document.getElementById('formulaireNousJoindre').submit();}">Envoyer</a>
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