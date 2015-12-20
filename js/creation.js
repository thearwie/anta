function afficherCreations() {
  var idEnVente = document.getElementById("select-categogie").selectedIndex + 1;
    
  $.ajax({
    type: "GET",
    url: "genererCollection.php?idClassement=0&idTypeProduit=0&idEnVente=" + idEnVente,
    dataType: "xml",
    success: function (xml) {      
      $(".collection-produit").empty();
      
      var collection = xml.getElementsByTagName("collection");
      var ids = collection[0].getElementsByTagName("id");
      var idproduits = collection[0].getElementsByTagName("idproduit");
      var noms = collection[0].getElementsByTagName("nom");
      var sourceimages = collection[0].getElementsByTagName("sourceimage");
      var creationProduit = document.getElementById("creation-produit");
      var nbProduitSurLigne = 1;
      var row = null;
      
      for(var i = 0; i < ids.length; i++) {
        var produit = null;
        var titre = null;
        var image = null;
        var prix = null;
        var bouton = null;
        var text = null;
        
        if(nbProduitSurLigne == 1) {
          row = document.createElement("div");
          row.setAttribute("class", "row");
          collectionProduit.appendChild(row);
        }
        
        produit = document.createElement("div");
        produit.setAttribute("class", "col-md-4");
        row.appendChild(produit);
        
        titre = document.createElement("h2");
        text = document.createTextNode(noms.item(i).firstChild.nodeValue);
        titre.appendChild(text);
        produit.appendChild(titre);
        
        image = document.createElement("img");
        image.setAttribute("class", "img-responsive img-creation");
        image.setAttribute("src", sourceimages.item(i).firstChild.nodeValue);
        image.setAttribute("alt", ids.item(i).firstChild.nodeValue);
        produit.appendChild(image);
        
        if(nbProduitSurLigne < 3) {
          nbProduitSurLigne++;
        } else {
          nbProduitSurLigne = 1;
        }
      }
    
      if(ids.length > 0)
      {
        for(var z = nbProduitSurLigne; z <= 3; z++)
        {
          var produitVide = document.createElement("div");
              produitVide.setAttribute("class", "col-md-4");
              row.appendChild(produitVide);
        }
      }
     
      if( !$.trim( $('#creation-produit').html() ).length ) {
        var contenuH2 = "";
        if(idEnVente == 1)
        {
          contenuH2 = "Aucune 'nouveauté' n'a été trouvée.";
        }
        else
        {
          contenuH2 = "Aucun 'produit plus en vente' n'a été trouvé.";
        }
        var texteAucunProduit = document.createTextNode(contenuH2);
        var h2 = document.createElement("h2");
        h2.appendChild(texteAucunProduit);
        creationProduit.appendChild(h2);
      }
    }
  });
}

afficherCreations();