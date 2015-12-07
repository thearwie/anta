<?php 

  
  $prenom = $_POST['txtPrenom'];
  $nom = $_POST['txtNom']; 
  $courriel = $_POST['txtCourriel']; 
  $message = $_POST['txtAreaCommentaire']; 
  
  $nomComplet = $prenom." ".$nom;
  
  //$from="De: $nomComplet<$courriel>\r\nReturn-path: $courriel"; 
  // $from="De: $courriel "; 
  
  $from = 'De: Emilio <emilio@hotmail.com>' . "\r\n";
  
  //$from = "MIME-Version: 1.0" . "\r\n";
  //$from = "Content-type:text/html;charset=UTF-8" . "\r\n";
  //$from .= "From: <$courriel>";
 
 
 
 $from = "De: Miguel Angel Alvarez <pepito@desarrolloweb.com>\r\n"; 
  echo $from;
 
  $subject="Message envoyé à partir du formulaire nous joindre"; 
  
  mail("pcarranza10@hotmail.com", $subject, $message, $from);
            
  echo "Message envoyé!<br/><br/><a href='http://webc.cegepsherbrooke.qc.ca/~viauma/index.php'>Retourner à la page d'accueil</a><br/><a href='http://webc.cegepsherbrooke.qc.ca/~viauma/nousJoindre.php'>Retourner au formulaire nous joindre</a>";
  
  
?>