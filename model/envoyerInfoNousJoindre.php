<?php 

  function check_input($data)
 {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }
  
  $prenom = check_input($_POST['txtPrenom']);
  $nom = check_input($_POST['txtNom']); 
  $courriel = check_input($_POST['txtCourriel']); 
  $message = check_input($_POST['txtAreaCommentaire']); 
  
  $from="De: $name<$email>\r\nReturn-path: $email"; 
  $subject="Message envoyé à partir du formulaire nous joindre"; 
  mail("pcarranza10@hotmail.com", $subject, $message, $from);
            
  echo "Message envoyé!<br/><br/><a href='http://webc.cegepsherbrooke.qc.ca/~viauma/index.php'>Retourner à la page d'accueil</a><br/><a href='http://webc.cegepsherbrooke.qc.ca/~viauma/nousJoindre.php'>Retourner au formulaire nous joindre</a>";
  
  
?>