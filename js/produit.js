var typeProduit = "";

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

function afficherProduit() {
  var idProduit = getParameterByName('idProduit');
  
  $.ajax({
    type: "GET",
    url: "genererProduit.php?idProduit=" + idProduit,
    dataType: "xml",
    success: function (xml) {
      var produit = xml.getElementsByTagName("produit");
      var nom = produit[0].getElementsByTagName("nom").item(0).firstChild.nodeValue;
      typeProduit = produit[0].getElementsByTagName("typeproduit").item(0).firstChild.nodeValue;
      var images = produit[0].getElementsByTagName("images");
      var prix = produit[0].getElementsByTagName("prix").item(0).firstChild.nodeValue;
      var dimensions = produit[0].getElementsByTagName("dimensions");
      var details = produit[0].getElementsByTagName("details");
      var autresImageXML = produits[0].getElementsByTagName("autresimages");
      
      var labelTitre = document.getElementById("titre-produit");
      var groupeImages = document.getElementById("groupe-images");
      var labelPrix = document.getElementById("label-prix");
      var inputQuantite = document.getElementById("input-quantite");
      var cbDimension = document.getElementById("select-dimension");
      var lienCharteDim = document.getElementById("lien-charte");
      var labelCategorie = document.getElementById("type-produit");
      var tabDetails = document.getElementById("tab-detail");
      var lienAutreImage1 = document.getElementById("lien-autre-img-1");
      var lienAutreImage2 = document.getElementById("lien-autre-img-2");
      var lienAutreImage3 = document.getElementById("lien-autre-img-3");
      var autreImage1 = document.getElementById("autre-img1");
      var autreImage2 = document.getElementById("autre-img2");
      var autreImage3 = document.getElementById("autre-img3");
      var lienAutresImages = [lienAutreImage1, lienAutreImage2, lienAutreImage3];
      var autresImages = [autreImage1, autreImage2, autreImage3];
      var contenuAutresProduits = document.getElementById("contenu-autres-produits");
      
      var lienImage = null;
      var image = null;
      var cbItem = null;
      var cbItemValue = null;
      var trAttribut = null;
      var tdNomAttribut = null;
      var tdValeurAttribut = null;
      
      location = "produit_detail.php?idProduit=" + idProduit;
      
      labelTitre.innerHTML = nom;
      
      for(var i = 0; i < images.length; i++)
      {
        lienImage = document.createElement("a");
        lienImage.setAttribute("href", images.item(i).firstChild.nodeValue);
        groupeImages.appendChild(lienImage);
        
        image = document.createElement("img");
        image.setAttribute("class", "img-responsive");
        image.setAttribute("src", images.item(i).firstChild.nodeValue);
      }
      
      labelPrix.innerHTML = prix;
      
      if(dimensions.length > 0)
      {
        $("#select-dimension").empty(); //on vide le contenu du combobox
        for(var x = 0; x < dimensions.length; x++)
        {
          var nomDimension = dimensions[x].getElementsByTagName("nomdimension").item(0).firstChild.nodeValue;
          var qtyDimension = dimension[x].getElementsByTagName("quantite").item(0).firstChild.nodeValue;
          
          cbItem = document.creatElement("option");
          cbItemValue = document.createTextNode(nomDimension);
          cbItemValue.setAttribute("value", qtyDimension);
          cbItem.appendChild(cbItemValue);
          
          cbDimension.appendChild(cbItem);
        }
        
        //Générer le lien de lien-charte
        
      }
      else
      {
        $(".dimension").remove(); //si pas de dimension on affiche aucune dimension
      }
      
      
      if(details.length > 0)
      {
        $("#tab-detail").empty(); //on vide le contenu du tableau de détails
        for(var y = 0; y < details.length; y++)
        {
          var nomAttribut = details[0].getElementsByTagName("attribut")[y].getElementsByTagName("nomattribut").item(0).firstChild.nodeValue;
          var valeur = details[0].getElementsByTagName("attribut")[y].getElementsByTagName("valeur").item(0).firstChild.nodeValue;
          var unite = details[0].getElementsByTagName("attribut")[y].getElementsByTagName("unite").item(0).firstChild.nodeValue;
          
          var contenuTdNomAttribut = bull;
          var contenuTdValeurAttribut = null;
          
          trAttribut = document.createElement("tr");
          tabDetails.appendChild(trAttribut);
          
          tdNomAttribut = document.createElement("td");
          contenuTdNomAttribut = document.createTextNode(nomAttribut);
          tdNomAttribut.appendChild(contenuTdValeurAttribut);
          
          
          tdValeurAttribut = document.createElement("td");
          contenuTdValeurAttribut = document.createElement(valeur + " " + unite);
          tdValeurAttribut.appendChild(contenuTdValeurAttribut);
          
          trAttribut.appendChild(tdNomAttribut);
          trAttribut.appendChild(tdValeurAttribut);
          
          tabDetails.appendChild(trAttribut);
        }
      }
      
      var premiereSourceImage = autresImageXML[0].getElementsByTagName("autreimage")[0].getElementsByTagName("sourceimage").item(0).firstChild.nodeValue;
      if(premiereSourceImage == "Aucun autre produit dans le système.")
      {
        $("#contenu-autres-produits").empty(); //on vide le contenu de la secteur "Autres produits"
        
        pasAutresProduits = document.createElement("h3");
        contenuPasAutresProduits = document.createTextNode(premiereSourceImage);
        pasAutresProduits.appendChild(contenuPasAutresProduits);
        
        contenuAutresProduits.appendChild(pasAutresProduits);
      }
      else(autresImages.length > 0)
      {
        for(var z = 0; z < autresImageXML.length; z++)
        {
          var idAutreImage = autresImageXML[0].getElementsByTagName("autreimage")[z].getElementsByTagName("id").item(0).firstChild.nodeValue;
          var sourceAutreImage = autresImageXML[0].getElementsByTagName("sourceimage")[z].getElementsByTagName("id").item(0).firstChild.nodeValue;
          
          
          var lastIndexOfHyphen = idAutreImage.lastIndexOf("-");
          var idSansImage = idAutreImage.substring(0, lastIndexOfHyphen);
          //var action = "afficherProduit('" + idSansImage + "');";
          var action = "location = 'produit_detail.php?idProduit='" + idSansImage + "';";
          
          lienAutresImages[z].setAttribute("onclick", action);
          autresImages[z].setAttribute("src", sourceAutreImage);
          autresImages[z].setAttribute("alt", idAutreImage);
        }
      }
    },    
    error: function (xhr, ajaxOptions, thrownError) {
      alert("L'état de la requête est: '" + xhr.status + "'.");
      alert("La réponse de la requëte est: '" + xhr.responseText + "'.");
      alert("L'erreur retournée est: '" + thrownError+ "'.");
    }
  });
}

function changerQtyRestante()
{
  var cbDimension = document.getElementById("select-dimension");
  var labelQtyRestante = document.getElementById("label-qty-restante");
  
  var contenuLvlQtyRestante = cbDimension.options[cbDimension.selectedIndex].value + " " + typeProduit.toLowerCase() + " restantes.";
  
  labelQtyRestante.innerHTML = contenuLvlQtyRestante;
}

afficherProduit();