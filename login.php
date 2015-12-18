<!DOCTYPE html>
<!--
/*******************************************************************************************************/
/*                                                                                                     */
/*  Fichier....................:  login.php                        			                           */
/*  Type.......................:  Document PHP                                                         */
/*  Titre......................:  Bijouterie Anta950                                                   */
/*  Auteurs....................:  ©Paola Marilu Carranza Gonzalez, 2015                                */
/*  Date de création...........:  2015-12-18                                                           */
/*  Date de mise en production.:                                                                       */
/*                                                                                                     */
/*******************************************************************************************************/
/*                                                                                                     */
/*  - Page login                                                                                       */
/*                                                                                                     */
/*******************************************************************************************************/
-->


<?php include('/inc/header.php')?>


<div class='page'>

	<section>
	<form id="formulaire" method="post" action="./login/verifier.php">
	    <?php 
		  if(isset($_GET['erreur'])){
			  echo '<center>Données invalides</center>';
		  }
		?>
		<label for="courriel">Adresse courriel</label><br>
		<input type="text" id="courrielLogin" name="Courriel" placeholder="courriel" size="60" ><br>
		<label for="password">Mot de passe</label><br>
		<input type="password" id="passwordLogin" name="Password" placeholder="mot de passe" size="60"><br>
		<input type="submit" name="ouvrirSession" value="Ouvrir Session" class="ouvrirSession">
	</form>
	</section>
	
</div>

<?php include('/inc/footer.php')?>