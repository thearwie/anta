<?php 

  $prenom = $_POST['txtPrenom'];
  $nom = $_POST['txtNom']; 
  $courriel = $_POST['txtCourriel']; 
  $password = $_POST['txtPassword']; 
  $adresse = $_POST['txtAdresse']; 
  $codePostal = $_POST['txtCodePostale']; 
  //$infolettre = '0';
  $ville = '10000'; 
  $infolettre = $_POST['checkboxInfolettre']; 
 
  echo $infolettre;
  
  
    $connexionDB = mysql_connect("webc.cegepsherbrooke.qc.ca", "viauma", "rurove") or die ("Couldn't connect to server");
    
    mysql_select_db("viauma",  $connexionDB) or die ("Couldn't select database");
    
    $query = "INSERT INTO utilisateur (id, nom, prenom, courriel, motPasse, adresse, codePostal, infolettre, idVille ) VALUES ('10003', ' $nom', '$prenom', ' $courriel', '$password', '$adresse', '$codePostal', '$infolettre', '$ville')";
    

    if(!mysql_query($query, $connexionDB))
    {
      die('Error: ' .mysql_error());
    }
    else 
    {
      echo "Merci pour s'inscrire";  
      
    }
    mysql_close($connexionDB);

  
?>