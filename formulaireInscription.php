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
        <input type="text" id="txtCourriel" name = "txtCourriel" size="40" />
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
        <input type="password" id="txtPasswordConfirmation" size="40" />
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
            <input type="text" id="txtCodePostale" name = "txtCodePostale" size="12" />
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
     
      <div class = "buttonEnvoyerInscription">
        <a class="button"  href="javascript:{}" onclick="document.getElementById('formulaireInscription').submit();">Envoyer</a>
      </div>
      
    </form>
      
    </div>
  </div>
<?php include('/inc/footer.php')?>



