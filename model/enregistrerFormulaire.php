<?php 

  $prenom = $_POST['txtPrenom'];
  $nom = $_POST['txtNom']; 
  $courriel = $_POST['txtCourriel']; 
  $password = $_POST['txtPassword']; 
  $adresse = $_POST['txtAdresse']; 
  $codePostal = $_POST['txtCodePostale']; 
  $ville = '10000'; 
  $infolettre=0;
  if(isset($_POST['checkboxInfolettre']))
  {
   $infolettre=1;
  }
  
    $connexionDB = mysql_connect("webc.cegepsherbrooke.qc.ca", "viauma", "rurove") or die ("Couldn't connect to server");
    
    mysql_select_db("viauma",  $connexionDB) or die ("Couldn't select database");
    
    $queryDernierIdUtilisateur = "SELECT MAX(id) as idUtilisateur FROM utilisateur";
    
    
    
    $result = mysql_query($queryInsertUtilisateur) or die ('Query failed: '.mysql_error());
    $total = mysql_num_rows($result);
    if($total)
    {
      $row = mysql_fetch_row($result);
      $idUtilisateur = $row["idUtilisateur"]+1;      
      
      
      
      if(!mysql_query($queryInsertUtilisateur, $connexionDB))
      {
        die('Error: ' .mysql_error());
      }$queryInsertUtilisateur = "INSERT INTO utilisateur (id, nom, prenom, courriel, motPasse, adresse, codePostal, infolettre, idVille ) VALUES ('$idUtilisateur', ' $nom', '$prenom', ' $courriel', '$password', '$adresse', '$codePostal', '$infolettre', '$ville')";
      else
      {
         echo "Merci pour s'inscrire";  
      }
        
        
     
    }
    else{
      echo "Pas d'enregistrements...";
    }
    mysql_close($connexionDB);
    
?>