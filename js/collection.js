var xmlHttp = createXmlHttpRequestObject();

function createXmlHttpRequestObject() {
  var xmlHttp;
  
  if(window.ActiveXObject) {
    try {
      xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    }catch(e) {
      xhmlHttp = false;
    }
  } else {
    try {
      xmlHttp = new XMLHttpRequest();
    } catch(e) {
      xmlHttp = false;
    }
  }
  
  if(!xmlHttp) {
    alert("Can't create xml object!");
  } else {   
    return xmlHttp;
  }
}

function afficherProduits() {
  if(xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
    // idTypeProduit = encodeURIComponent(document.getElementById("select-categogie").selectedIndex);
    idTypeProduit = document.getElementById("select-categogie").selectedIndex;
    xmlHttp.open("GET", "genererCollection.php?idTypeProduit="+idTypeProduit, true);
    
    //Appel de fonction quand on reçoit la réponse xml
    xmlHttp.onreadystatechange = handleServerResponse;
    xmlHttp.send(null);
    
  } else {
    setTimeout("afficherProduits(), 1000");
  }
}

function handleServerResponse() {
  //done communicating
  if(xmlHttp.readyState == 4) {
    //la communication s'est bien passé
    if(xmlHttp.status == 200) {
      alert("La communication avec php a réussi!");
      xmlDoc = xmlHttp.responseXML;
      collection = xmlDoc.getElementsByTagName("collection");
      // document.getElementById("collection-produit").innerHTML = xmlDocumentElement.firstChild;
      // document.getElementById("collection-produit").innerHTML = xmlResponse;
      document.getElementById("collection-produit").innerHTML = collection;
      // setTimeout(afficherProduits(), 1000);
    } else {
    alert("La génération de produits a échouée!");
    }
  } 
}