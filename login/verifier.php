<?php
session_start();
include "../conexion.php";
$re=mysql_query("select * from utilisateur where courriel='".$_POST['Courriel']."' AND 
 					motPasse='".$_POST['Password']."'")	or die(mysql_error());
					
while ($f=mysql_fetch_array($re)) {
	$infoUtilisateur[]=array('Prenom'=>$f['prenom'],
							 'Nom'=>$f['nom']);
}
if(isset($infoUtilisateur)){
	$_SESSION['User']=$infoUtilisateur;
	header("Location: ../monCompte.php");
}else{
	header("Location: ../login.php?erreur=Données invalides");
}


?>