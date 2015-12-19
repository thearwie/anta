<?php
session_start();
//include "../conexion.php";

$courriel = $_POST['Courriel'];
$motPasse = $_POST['Password'];

$connexionDB = mysql_connect("webc.cegepsherbrooke.qc.ca", "viauma", "rurove") or die ("Couldn't connect to server");  
mysql_select_db("viauma",  $connexionDB) or die ("Couldn't select database");

$re=mysql_query("select * from utilisateur where courriel='".$courriel."' AND 
 					motPasse='".$motPasse."'")	or die(mysql_error());
					
while ($f=mysql_fetch_array($re)) {
	$infoUtilisateur[]=array('Prenom'=>$f['prenom'],
							 'Nom'=>$f['nom'],
							 'Id'=>$f['id']);
}

if(isset($infoUtilisateur)){
/*	$_SESSION['User']=$infoUtilisateur;
	echo '<script type="text/javascript">
	window.location.assign("../monCompte.php?user='.$infoUtilisateur[0]['Id'].'");
	</script>';*/
	
	$_SESSION['User']=$infoUtilisateur;
	echo $infoUtilisateur[0]['Id'];
	echo '<script type="text/javascript">
	window.location.assign("../monCompte.php");
	</script>';
	
	
}else{
	echo '<script type="text/javascript">
	window.location.assign("../login.php?erreur=Données invalides");
	</script>';
}

?>