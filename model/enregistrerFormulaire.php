<?php
  
  if(isset($_POST['txtPrenom']) && !empty($_POST['txtPrenom']) && isset($_POST['txtNom']) && !empty($_POST['txtNom']))
  {
  
    $connexionDB = mysql_connect("localhost", "viauma", "rurove") or die ("Couldn't connect to server");
    
    mysql_select_db("viauma",  $connexionDB) or die ("Couldn't select database");
    
    $query = "INSERT INTO utilisateur (id, nom, prenom, courriel, motPasse, adresse, codePostal, infolettre, idVille ) 
              VALUES ('10001', '$_POST['txtPrenom']', '$_POST['txtNom']', '', '', '', '', 0, 1)";
    
    if(!mysql_query($query, $connexionDB))
    {
      die('Error: ' .mysql_error());
    }
    else 
      
      echo "Merci pour s'inscrire";
    
    mysql_close($connexionDB);
  
  }
?> 