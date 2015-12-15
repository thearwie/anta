<!DOCTYPE html>
<!--
/*******************************************************************************************************/
/*                                                                                                     */
/*  Fichier....................:  gestion_produit.php                                                  */
/*  Type.......................:  Document PHP                                                         */
/*  Titre......................:  Bijouterie Anta950                                                   */
/*  Auteurs....................:  ©Maxime Viau, 2015                                                   */
/*  Date de création...........:  2015-11-16                                                           */
/*  Date de mise en production.:                                                                       */
/*                                                                                                     */
/*******************************************************************************************************/
/*                                                                                                     */
/*  - Page de gestion des produits                                                                     */
/*                                                                                                     */
/*******************************************************************************************************/
-->
<html>
  <head>
    <title>Gestion des produits</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Site de vente de la bijouterie avec exposition des créations">
    <meta name="keywords" content="Bijou, bague, collier, boucle d'oreille, bracelet">
    <meta name="author" content="Michaël Bilodeau, Paola Carranza, Maxime Viau">

    <link rel="stylesheet" type="text/css"  href="css/admin.css" />
    <script>
      function afficherPage(str) {
        if (window.XMLHttpRequest) {
          // code for modern browsers
          xhttp = new XMLHttpRequest();
          } else {
          // code for IE6, IE5
          xhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xhttp.onreadystatechange = function() {
          document.getElementById("contenu_page").innerHTML = xhttp.responseText;
        };
        xhttp.open("POST", str+".php", true);
        xhttp.send();
      }
    </script>
    
  </head>
  <body>
    <div class='page'>
      <h1>Gestion des produits</h1>

      <label>Action</label>
      <br/>
      <select id="choix_page" onchange="afficherPage(this.value)">
        <option value="ajouter_produit" selected>Ajouter</option>
        <option value="modifier_produit">Modifier/Supprimer</option>
      </select>
      <br/>
      <br/>
      <label>Catégorie</label>
      <br/>
      <ul class="ul_horizontal groupe_toggle_btn">
        <li><input type="radio" name="produit" value="bague" class="toggle_btn" checked>Bague</li>
        <li><input type="radio" name="produit" value="collier" class="toggle_btn">Collier</li>
        <li><input type="radio" name="produit" value="boucleOreille" class="toggle_btn">Boucle d'oreille</li>
        <li><input type="radio" name="produit" value="bracelet" class="toggle_btn">Bracelet</li>
      </ul>
      <br/>
      
      <div id="contenu_page">
      <?php include("ajouter_produit.php");?>
      </div>
      
     

  </div>
  </body>
</html>

