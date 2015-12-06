var nbAfficherDetailsAppels = 0;
var idProduit = 0;

function afficherProduits() {
  var idTypeProduit = document.getElementById("select-categogie").selectedIndex;
  var idClassement = document.getElementById("select-classement").selectedIndex;
  
  $.get("genererCollection.php", {idClassement: idClassement, idTypeProduit: idTypeProduit}, function() {
    var nomFichier = "";
    if(idTypeProduit > 0)
      nomFichier = "collection" + idTypeProduit + ".xml";
    else
      nomFichier = "collection.xml";
    
    $.ajax({
      type: "GET",
      url: nomFichier,
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
        
        for(var i = 0; i < ids.length; i++) {
          var produit = null;
          var titre = null;
          var image = null;
          var prix = null;
          var bouton = null;
          var text = null;
          var idProduit = idproduits.item(i).firstChild.nodeValue;
          
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
          
          bouton = document.createElement("button");
          bouton.setAttribute("id", "bouton" + i);
          bouton.setAttribute("class", "btn btn-primary bouton-detail");
          bouton.setAttribute("type", "button");
          bouton.onclick = function(event) {
            var idProduitInterne = idProduit;
            afficherDetail(idProduitInterne);
          };
          // boutons[i].setAttribute("href", "#");
          // boutons[i].setAttribute("onclick", "afficherDetail(idProduit);");
           
          /* boutons[i].addEventListener("click", function(){
            afficherDetail(idProduit)
          }); */
          // bouton.setAttribute("onclick", "afficherDetail(idProduit);");
           // $("#bouton" + i).click(afficherDetail(idProduit));
           // $("#bouton" + i).on("click", afficherDetail(idProduit));
          // boutons[i].onclick = afficherDetail(idProduit);
          text = document.createTextNode("Détails");
          bouton.appendChild(text);
          produit.appendChild(bouton);
          
          nbAfficherDetailsAppels = 0;
          
          if(nbProduitSurLigne < 3) {
            nbProduitSurLigne++;
          } else {
            nbProduitSurLigne = 1;
          }
        }
      }
    });
  });
  nbAfficherDetailsAppels = 1;
}

function afficherDetail(idProduit) {
  // $.get("produit_detail.php", {idProduit: idProduit});
  if(nbAfficherDetailsAppels >= 1)
  {
    location = "produit_detail.php?idProduit=" + idProduit;
    // alert("it worked!");
  }
  nbAfficherDetailsAppels++;
}

afficherProduits();