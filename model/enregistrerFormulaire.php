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
    
    
    
    $result = mysql_query($queryDernierIdUtilisateur) or die ('Query failed: '.mysql_error());
   
    $total = mysql_num_rows($result);
    
    if($total)
    {
      while($row = mysql_fetch_array($result))
      {
        $idUtilisateur = $row["idUtilisateur"] + 1;      
      }
      
      $queryInsertUtilisateur = "INSERT INTO utilisateur (id, nom, prenom, courriel, motPasse, adresse, codePostal, infolettre, idVille ) VALUES ('$idUtilisateur', ' $nom', '$prenom', ' $courriel', '$password', '$adresse', '$codePostal', '$infolettre', '$ville')";
        
      if(!mysql_query($queryInsertUtilisateur, $connexionDB))
      {
        die('Error: ' .mysql_error());
      }
      else
      {
         echo "Merci pour s'inscrire";
         echo '</br></br><a href="http://webc.cegepsherbrooke.qc.ca/~viauma/index.php">Retourner à la page d"'"accueil</a>';
         
        /* header("Status: 301 Moved Permanently", false, 301);
         header('Location: http://webc.cegepsherbrooke.qc.ca/~viauma/index.php');
         exit();*/
      }
        
    }
    else{
      echo "Pas d'enregistrements...";
    }
    mysql_close($connexionDB);
    
?>