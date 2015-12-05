<?php 

  $prenom = $_POST['txtPrenom'];
  $nom = $_POST['txtNom']; 
  $courriel = $_POST['txtCourriel']; 
  $message = $_POST['txtAreaCommentaire']; 
  
  $from="De: $name<$email>\r\nReturn-path: $email"; 
  $subject="Message envoyé à partir du formulaire nous joindre"; 
  mail("email@adress.com", $subject, $message, $from);
            
  echo "Message envoyé!<br/><br/><a href='index.php'>Retourner à la page d'accueil</a><br/><a href='nous_joindre.php'>Retourner au formulaire de contact</a>";
  
  
?>