var xmlHttp = createXmlHttpRequestObject();

function createXmlHttpRequestObject() {
  var xmlHttp;
  
  if(window.XMLHttpRequest) {
    xmlHttp = new XMLHttpRequest();
  } else {
    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  return xmlHttp;
}

function afficherProduits() {
  if(xmlHttp) {
    try {
      // idTypeProduit = encodeURIComponent(document.getElementById("select-categogie").selectedIndex);
      idTypeProduit = document.getElementById("select-categogie").selectedIndex;
      xmlHttp.open("GET", "genererCollection.php?idTypeProduit="+idTypeProduit, true);
      
      //Appel de fonction quand on reçoit la réponse xml
      xmlHttp.onreadystatechange = handleRequestState;
      
      xmlHttp.send(null);
    } catch(e) {
      alert(e.toString());
    }
}

function handleRequestState() {
  //done communicating
  if(xmlHttp.readyState == 1) {
    alert("Status 1: server connection established.");
  } else if(xmlHttp.readyState == 2) {
    alert("Status 2: request received.");
  } else if(xmlHttp.readyState == 3) {
    alert("Status 3: processing request.");
  } else if(xmlHttp.readyState == 4) {
    
    if(xmlHttp.status == 200) { //la communication s'est bien passé
      try {
        handleResponse();
      } catch(e) {
        alert(e.toString());
      }
    } else {
    alert(xmlHttp.statusText);
    }
  } 
}

function handleResponse() {
  var xmlResponse = xmlHttp.responseXML;
  var collection = xmlResponse.documentElement;
  var ids = collection.getElementsByTagName("id");
  var noms = collection.getElementsByTagName("nom");
  var sourceimages = collection.getElementsByTagName("sourceimage");
  var prix = collection.getElementsByTagName("prix");
  var collectionProduit = document.getElementById("collection-produit");
  var nbProduitSurLigne = 1;
  
  row = document.createElement("div");
  row.setAttribute("class", "row");
  collectionProduit.appendChild(row);
  
  for(var i = 0; i < ids.length; i++) {
    var row;
    var produit;
    var titre;
    var image;
    var prix;
    var bouton;
    var text;
    
    if(nbProduitSurLigne == 1) {
      row = document.createElement("div");
      row.setAttribute("class", "row");
      collectionProduit.appendChild(row);
    }
    
    produit = document.createElement("div");
    produit.setAttribute("class", "col-md-4");
    row.appendChild(produit);
    
    titre = document.createElement("h2");
    text = document.createTextNode(noms.item(i).firstChild.data);
    titre.appendChild(text);
    produit.appendChild(titre);
    
    image = document.createElement("img");
    image.setAttribute("class", "img-responsive img-produit");
    image.setAttribute("src", sourceimages.item(i).firstChild.data);
    image.setAttribute("alt", ids.item(i).firstChild.data);
    produit.appendChild(image);
    
    prix = document.createElement("h3");
    prix.setAttribute("class", "prix");
    text = document.createTextNode(prix.item(i).firstChild.data);
    prix.appendChild(text);
    produit.appendChild(prix);
    
    bouton = document.createElement("button");
    bouton.setAttribute("class", "btn btn-primary bouton-detail");
    bouton.setAttribute("type", "button");
    bouton.setAttribute("href", "#");
    text = document.createTextNode("Détails");
    bouton.appendChild(text);
    produit.appendChild(bouton);
    
    if(nbProduitSurLigne < 3) {
      nbProduitSurLigne++;
    } else {
      nbProduitSurLigne = 1;
    }
    
    /* echo "<div class='col-md-4'>\n";
    echo "<h2>" . $mesProduits[$i]->getNom() . "</h2>\n";
    echo "<img class='img-responsive img-produit' src='img/" . $nomDossier . "/" . $mesProduits[$i]->getId() . ".jpg' alt='" . $mesProduits[$i]->getId() . "'>\n";
    echo "<h3 class='prix'>" . number_format((float)$mesProduits[$i]->getPrix(), 2, '.', '') . " CAD$</h3>\n";
    echo "<button type='button' class='btn btn-primary bouton-detail' href='#'>Détails</button>\n";
    echo "</div>\n";
    
    if($nbProduitSurLigne == 3)
    {
      echo "</div>\n";
      echo "<div class='row'>\n";
      $nbProduitSurLigne = 1;
    }
    else if($nbProduitSurLigne == 3 && $i == count($mesProduits)-1)
    {
      echo "</div>\n";
    }
    else
    {
      $nbProduitSurLigne++;
    } */
  }
  
  /* alert("Status 4: request is finished and response is ready.");
  xmlDoc = xmlHttp.responseXML;
  collection = xmlDoc.getElementsByTagName("collection");
  document.getElementById("collection-produit").innerHTML = xmlDocumentElement.firstChild;
  document.getElementById("collection-produit").innerHTML = xmlDoc;
  document.getElementById("collection-produit").innerHTML = collection;
  setTimeout(afficherProduits(), 1000);
  
  $idTypeProduit = $_GET["idTypeProduit"];
  $mesProduits = getAllProduit($idTypeProduit);
  $nbProduitSurLigne = 1;

  echo "<div class='row'>";
  for($i=0; $i<count($mesProduits)-1; $i++) 
  {
    echo "<div class='col-md-4'>\n";
    echo "<h2>" . $mesProduits[$i]->getNom() . "</h2>\n";
    echo "<img class='img-responsive img-produit' src='img/" . $nomDossier . "/" . $mesProduits[$i]->getId() . ".jpg' alt='" . $mesProduits[$i]->getId() . "'>\n";
    echo "<h3 class='prix'>" . number_format((float)$mesProduits[$i]->getPrix(), 2, '.', '') . " CAD$</h3>\n";
    echo "<button type='button' class='btn btn-primary bouton-detail' href='#'>Détails</button>\n";
    echo "</div>\n";
    
    if($nbProduitSurLigne == 3)
    {
      echo "</div>\n";
      echo "<div class='row'>\n";
      $nbProduitSurLigne = 1;
    }
    else if($nbProduitSurLigne == 3 && $i == count($mesProduits)-1)
    {
      echo "</div>\n";
    }
    else
    {
      $nbProduitSurLigne++;
    }
  } */
}

afficherProduits();