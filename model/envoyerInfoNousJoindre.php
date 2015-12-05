<?php 

  
  $prenom = $_POST['txtPrenom'];
  $nom = $_POST['txtNom']; 
  $courriel = $_POST['txtCourriel']; 
  $message = $_POST['txtAreaCommentaire']; 
  
  $nomComplet = $prenom." ".$nom;
  
  $from="De: $nomComplet<$courriel>\r\nReturn-path: $courriel"; 
  
  $subject="Message envoyé à partir du formulaire nous joindre"; 
  mail("pcarranza10@hotmail.com", $subject, $message, $from);
            
  echo "Message envoyé!<br/><br/><a href='http://webc.cegepsherbrooke.qc.ca/~viauma/index.php'>Retourner à la page d'accueil</a><br/><a href='http://webc.cegepsherbrooke.qc.ca/~viauma/nousJoindre.php'>Retourner au formulaire nous joindre</a>";
  
  
?>