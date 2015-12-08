
<?php 
 
  $prenom = $_POST['txtPrenom'];
  $nom = $_POST['txtNom']; 
  $courriel = $_POST['txtCourriel']; 
  $message = $_POST['txtAreaCommentaire']; 
  $typeService = $_POST['selectService']; 
  
 
  $nomComplet = $prenom." ".$nom;
  
  $from="De: $prenom<$courriel>\r\nReturn-path: $courriel"; 

  $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

  $headers .= "Reply-To:$nomComplet<$courriel>\r\n"; 
 
 
  $subject="Message du formulaire Services - $typeService"; 
   
  mail("pcarranza10@hotmail.com", $subject, $message, $headers);
            
  echo "Message envoyé!<br/><br/><a href='http://webc.cegepsherbrooke.qc.ca/~viauma/index.php'>Retourner à la page d'accueil</a><br/><a href='http://webc.cegepsherbrooke.qc.ca/~viauma/nousJoindre.php'>Retourner au formulaire nous joindre</a>";
  
  
?>