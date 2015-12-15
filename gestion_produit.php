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
  </head>
  <body>
    <div class='page'>
      <h1>Gestion des produits</h1>

      <label>Action</label>
      <br/>
      <select>
        <option value="ajouter" selected>Ajouter</option>
        <option value="modifier/supprimer">Modifier/Supprimer</option>
      </select>
      <br/>
      
      <?php include("ajouter_produit.php")?>

  </div>
  </body>
</html>