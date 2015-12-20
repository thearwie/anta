$.getScript("js/produit.js");

var idProduit = 0;

function afficherProduits() {
  var idTypeProduit = document.getElementById("select-categogie").selectedIndex;
  var idClassement = document.getElementById("select-classement").selectedIndex;
  
  $.ajax({
    type: "GET",
    url: "genererCollection.php?idClassement=" + idClassement + "&idTypeProduit=" + idTypeProduit + "&idEnVente=0",
    dataType: "xml",
    success: function (xml) {
      $(".collection-produit").empty();
      
      var collection = xml.getElementsByTagName("collection");
      var ids = collection[0].getElementsByTagName("id");
      var idproduits = collection[0].getElementsByTagName("idproduit");
      var noms = collection[0].getElementsByTagName("nom");
      var sourceimages = collection[0].getElementsByTagName("sourceimage");
      var listePrix = collection[0].getElementsByTagName("prix");
      var collectionProduit = document.getElementById("collection-produit");
      var boutons = [];
      var nbProduitSurLigne = 1;
      var row = null;
      var idBouton = 0;
      
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
        image.setAttribute("class", "img-responsive img-produit");
        image.setAttribute("src", sourceimages.item(i).firstChild.nodeValue);
        image.setAttribute("alt", ids.item(i).firstChild.nodeValue);
        produit.appendChild(image);
        
        prix = document.createElement("h3");
        prix.setAttribute("class", "prix");
        text = document.createTextNode(listePrix.item(i).firstChild.nodeValue);
        prix.appendChild(text);
        produit.appendChild(prix);
        
        idBouton = "bouton" + i;
        bouton = document.createElement("input");
        bouton.setAttribute("id", idBouton);
        bouton.setAttribute("class", "btn btn-primary bouton-detail");
        bouton.setAttribute("type", "button");
        bouton.setAttribute("value", "Détails");
        produit.appendChild(bouton);
        
        if(nbProduitSurLigne < 3) {
          nbProduitSurLigne++;
        } else {
          nbProduitSurLigne = 1;
        }
      }
      
      for(var y = 0; y < idproduits.length; y++) {
        idBouton = "bouton" + y;
        var idProduit = idproduits.item(y).firstChild.nodeValue;
        var nomMethode = "afficherProduit('" + idProduit + "');";
        document.getElementById(idBouton).setAttribute("onclick", nomMethode);
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
      
      if( !$.trim( $('#collection-produit').html() ).length ) {
        var contenuH2 = "";
        switch(idTypeProduit)
        {
          case 0:
          contenuH2 = "Aucun 'produit' n'a été trouvé.";
          break;
          
          case 1:
          contenuH2 = "Aucune 'boucle d'oreille' n'a été trouvée.";
          break;
          
          case 2:
          contenuH2 = "Aucun 'bracelet' n'a été trouvé.";
          break;
          
          case 3:
          contenuH2 = "Aucun 'collier' n'a été trouvé.";
          break;
        }
        var texteAucunProduit = document.createTextNode(contenuH2);
        var h2 = document.createElement("h2");
        h2.appendChild(texteAucunProduit);
        collectionProduit.appendChild(h2);
      }
    }
  });
}

/*function afficherDetail(idProduit) {
	location = "produit_detail.php?idProduit=" + idProduit;
}*/

//afficherProduits();