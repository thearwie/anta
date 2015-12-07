
<?php 

  
  $prenom = $_REQUEST['txtPrenom'];
  $nom = $_REQUEST['txtNom']; 
  $courriel = $_REQUEST['txtCourriel']; 
  $message = $_REQUEST['txtAreaCommentaire']; 
  
 
  $nomComplet = $prenom." ".$nom;
  
  $from="De: $prenom<$courriel>\r\nReturn-path: $courriel"; 

  $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
  $headers .= "Reply-To: <$courriel>\r\n"; 

 
  $subject="Message envoyé à partir du formulaire nous joindre"; 
  
  mail("pcarranza10@hotmail.com", $subject, $message, $headers);
            
  echo "Message envoyé!<br/><br/><a href='http://webc.cegepsherbrooke.qc.ca/~viauma/index.php'>Retourner à la page d'accueil</a><br/><a href='http://webc.cegepsherbrooke.qc.ca/~viauma/nousJoindre.php'>Retourner au formulaire nous joindre</a>";
  
  
?>