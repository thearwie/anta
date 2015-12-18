<?php
session_start();
//include "../conexion.php";
$connexionDB = mysql_connect("webc.cegepsherbrooke.qc.ca", "viauma", "rurove") or die ("Couldn't connect to server");  
mysql_select_db("viauma",  $connexionDB) or die ("Couldn't select database");

$re=mysql_query("select * from utilisateur where courriel='".$_POST['Courriel']."' AND 
 					motPasse='".$_POST['Password']."'")	or die(mysql_error());
					
while ($f=mysql_fetch_array($re)) {
	$infoUtilisateur[]=array('Prenom'=>$f['prenom'],
							 'Nom'=>$f['nom']);
}
echo $infoUtilisateur;
if(isset($infoUtilisateur)){
	$_SESSION['User']=$infoUtilisateur;
	header("Location: ../monCompte.php");
	echo "Hola1";
}else{
	header("Location: ./login.php");
	echo "Hola2";
}


?>