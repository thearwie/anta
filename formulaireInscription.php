<!DOCTYPE html>
<!--
/*******************************************************************************************************/
/*                                                                                                     */
/*  Fichier....................:  formulaireInscription.php                                            */
/*  Type.......................:  Document PHP                                                         */
/*  Titre......................:  Bijouterie Anta950                                                   */
/*  Auteurs....................:  ©Paola Marilu Carranza Gonzalez, 2015                                */
/*  Date de création...........:  2015-11-26                                                           */
/*  Date de mise en production.:                                                                       */
/*                                                                                                     */
/*******************************************************************************************************/
/*                                                                                                     */
/*  - Page formulaire d'inscription                                                                    */
/*                                                                                                     */
/*******************************************************************************************************/
-->

<!-- CONTROLLER -->
<?php 
  //$page = 'formulaire';
?>

<!-- VIEW -->

<?php include('/inc/header.php')?>


<div class='page'>


  <div class= "formulaireInscription">
  
  <form id = "formulaireInscription" name="formulaireInscription" action = "model/enregistrerFormulaire.php" method="post">
  
     <div class = "titreFormulaire">
       <span class="spanInscription">Créer un profil</span>	
     </div>
     <div class = "label">
       <span class="infoDetail">* Tous les champs sont obligatoires</span>
      </div>
      <div class="prenom">
        <div class = "labelFormulaireInscription">
          <span class="spanInscription">Prénom</span>
        </div>	
        <div class = "input">
          <input type="text" id="txtPrenom" name = "txtPrenom" size="40" />
        </div>
      </div>
      <div class="nom">
        <div class = "labelFormulaireInscription">
          <span class="spanInscription">Nom</span>
        </div>	
        <div class = "input">
          <input type="text" id="txtNom"  name = "txtNom" size="40" />
        </div>
      </div>
      <div class="courriel">
        <div class = "labelFormulaireInscription">
          <span class="spanInscription">Courriel</span>
          </div>	
        <div class = "input">
        <input type="text" id="txtCourriel" name = "txtCourriel" size="40" onblur="valider('txtCourriel');" />
        </div>
      </div>
      <div class="motPasse">
        <div class = "labelFormulaireInscription">
          <span class="spanInscription">Mot de passe</span>
          </div>	
        <div class = "input">
        <input type="password" id="txtPassword" name = "txtPassword" size="40" />
        </div>
      </div>
      <div class="confirmationMotPasse">
        <div class = "labelFormulaireInscription">
          <span class="spanInscription">Confirmez le mot de passe</span>
          </div>	
        <div class = "input">
        <input type="password" id="txtPasswordConfirmation" name="txtPasswordConfirmation"  size="40" />
        </div>
      </div>
      <div class="adresse1">
        <div class = "labelFormulaireInscription">
          <span class="spanInscription">Adresse</span>
        </div>	
        <div class = "input">
          <input type="text" id="txtAdresse" name = "txtAdresse" size="40" />
        </div>
      </div>
      <div class="adresse2">
        <div class="codePostale">
          <div class = "labelFormulaireInscription">
            <span class="spanInscription">Code Postale</span>
          </div>	
          <div class = "input">
            <input type="text" id="txtCodePostale" name = "txtCodePostale" size="12" onblur="valider('txtCodePostale');"/>
          </div>
        </div>
        <div class="ville">
          <div class = "labelFormulaireServices">
            <span class="spanServices">Ville</span>
          </div>	
          <div>
            <select class = "selectVille" name="selectVille">
              <option class="optionSelectInscription" value="value1" selected>Sherbrooke</option> 
              <option class="optionSelectInscription" value="value2">Granby</option>
            </select>
          </div>
        </div>
      </div>
      <div class="adresse3">
        <div class = "labelFormulaireInscription">
          <span class="spanInscription">Province</span>
        </div>
        <div>        
          <select class = "selectProvince" name="select">
            <option class="optionSelectInscription" value="value1">Québec</option> 
          </select>
        </div>
      </div>

      <div class="adresse4">
        <div class = "labelFormulaireInscription">
          <span class="spanInscription">Pays</span>
        </div>	
        <select class = "selectPays" name="select">
            <option class="optionSelectInscription" value="value1">Canada</option> 
        </select>
      </div> 
      
      <div class = "infolettre">
        <input type="checkbox" name="checkboxInfolettre" value="checkbox"><span class="spanInfolettre">PJ'accepte que la Bijouterie Anta950 me transmettre des messages par voie électronique contenant des offres et de l'information sur des produits et services 
        susceptibles de m'intéresser. Je peux retirer ce consentement en tout temps en annulant mon abonnement à ses messages.</span>        
      </div>
     
      <div class = "buttonEnvoyerInscription">
        <a class="button"  href="javascript:{}" onclick = "if(formulaireComplet()){document.getElementById('formulaireInscription').submit();}">Envoyer</a>
      </div>
      
    </form>
      
    </div>
  </div>
  
  
<script type="text/javascript">
/*****************************************************************************/
      /* VARIABLES GLOBALES                                                        */
      /*****************************************************************************/
      var idControlInput = ['txtPrenom', 'txtNom', 'txtCourriel', 'txtPassword', 'txtPasswordConfirmation' , 'txtAdresse','txtCodePostale', ]; 

      var nomChamp = ['Prénom', 'Nom', 'Courriel', 'Mot de passe', 'Confirmation de mot de passe', 'Adresse', 'Code postal' ]; 						 
	
      /*=============================================================================*/
      function valider(idObjet)
      /*=============================================================================*/
      { 
        var var_id = document.getElementById(idObjet);
		
        if(var_id.id == "txtCodePostale" && var_id.value != '')
        {
          var_expReg = /^[a-zA-Z]\d[a-zA-Z](-?|\s)\d[a-zA-Z]\d$/;
		  
          if(var_expReg.test(var_id.value) == false)
          {
            alert('Le code postal entré est incorrect\n \n Les formats possibles sont: \n'+
                  'A9A 9A9|A9A-9A9|A9A9A9');
            window.setTimeout(function(){var_id.select()},0);
            return false;	         
          }
          return true;  
        }
        else if(var_id.id == "txtCourriel" && var_id.value != '')
        {
          var_expReg = /^((\w+([\.-]?\w+)*@((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)))|(\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+))$/
   
          if(var_expReg.test(var_id.value) == false)
          {
            alert('Le courriel entré est incorrecte\n\nLe format est:\n'+
                  'compte@domaine.ext | compte@255.255.255.0');
            window.setTimeout(function(){var_id.select()},0);	
            return false;		  
          } 	
          return true;  
        }
        
      } 
	  
     /*=============================================================================*/
      function formulaireComplet()
      /*=============================================================================*/
      {
        var listeInputVide = 'Remplir le(s) champ(s):\n';	
        var flagVerifChampsVides = 0;
        var nombreControl = 0;
        var idControl = '';
		 
        for( nombreControl = 0; nombreControl < 7; nombreControl++)
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



