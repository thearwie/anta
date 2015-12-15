<form action="ajouter_produit.php">
<?php include("requete_admin.php")



    <label>Choisir bijou</label>
    <!-- <br/> -->
    <div class="conteneur">
    <div class="cellule">
      <div class="image_cellule">
        <div style="width: 150px; height: 100px; background-color: #0000ff;"></div>
      </div>
      <div class="checkbox_cellule">
        <input type="radio" id="nouveau" name="test" value="Nouveau" checked>
        <label for="nouveau">Nouveau</label>
      </div>
    </div>
    <div class="cellule">
      <div class="image_cellule">
        <div style="width: 150px; height: 100px; background-color: #ff0000;"></div>
      </div>
      <div class="checkbox_cellule">
        <input type="radio" id="test1" name="test" value="Diamand">
        <label for="test1">Diamand</label>
      </div>
    </div>
    <div class="cellule">
      <div class="image_cellule">
        <div style="width: 150px; height: 100px; background-color: #ff0000;"></div>
      </div>
      <div class="checkbox_cellule">
        <input type="radio" id="test2" name="test" value="Diamand1">
        <label for="test2">Diamand</label>
      </div>
    </div>
    <div class="cellule">
      <div class="image_cellule">
        <div style="width: 150px; height: 100px; background-color: #ff0000;"></div>
      </div>
      <div class="checkbox_cellule">
        <input type="radio" id="test3" name="test" value="Diamand2">
        <label for="test3">Diamand</label>
      </div>
    </div>
    <div class="cellule">
      <div class="image_cellule">
        <div style="width: 150px; height: 100px; background-color: #ff0000;"></div>
      </div>
      <div class="checkbox_cellule">
        <input type="radio" id="test4" name="test" value="Diamand3">
        <label for="test4">Diamand</label>
      </div>
    </div>
    <div class="cellule">
      <div class="image_cellule">
        <div style="width: 150px; height: 100px; background-color: #ff0000;"></div>
      </div>
      <div class="checkbox_cellule">
        <input type="radio" id="test5" name="test" value="Diamand4">
        <label for="test5">Diamand</label>
      </div>
    </div>
  </div>
  
  <div class="groupe">
    
    <div class="colonne">
      <label>Code</label>
      <br/>
      <input type="text" name="code">
      <br/><br/>

      <label>Matériel principal</label>
      <br/>
      <select>
      <option value="Argent 950" selected>Argent 950</option>
      <option value="Argent 925">Argent 925</option>
      <option value="or 14k">Or 14k</option>
      </select>
      <br/><br/>

      <label>Autres matériaux</label>
      <br/>
      <div class="wrapper">        
        <div class="colonne">
          <label class="lblCheckbox" for="diamand">Diamand</label>
          <label class="lblCheckbox" for="rubis">Rubis</label>
          <label class="lblCheckbox" for="zircon">Zircon</label>
        </div>
        <div>
          <input type="checkbox" id="diamand" name="diamand" value="Diamand"><br/>
          <input type="checkbox" id="rubis" name="rubis" value="Rubis"><br/>
          <input type="checkbox" id="zircon" name="zircon" value="Zircon"><br/>
        </div>
      </div>
    </div>
    <div class="colonne">
      <label>Image</label> 
      <br/>
      <input type="button" id="parcourir" name="parcourir" value="parcourir">
    </div>
    <div class="colonne">
      <div id="photo_produit">&nbsp;</div>
    </div>
  </div>
  <div class="groupe" style="padding: 10px; padding-left: 0px;">
    <div class="colonne">
      <label>Prix ($)</label>
      <br/>
      <input type="text" name="prix">
      <br/>
      <br/>
    </div>
    <div class="colonne">
      <label>Produit en vente?</label>
      <br/>
      <input type="radio" id="rBtnOui" name="enVente" value="oui"><label for="rBtnOui">Oui</label>
      <input type="radio" id="rBtnNon" name="enVente" value="non"><label for="rBtnNon">Non</label><br/>
    </div>
  </div>
  <br/>

  <label>Quantité</label>
  <br/>
  <input type="number" name="quantite" value="0">

  <br/>
  <br/>
  <input type="button" name="enregistrer" value="Enregistrer">
  <input type="button" name="annuler" value="Annuler">
</form>