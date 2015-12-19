<?php
session_start();
//include '../conexion.php';
$connexionDB = mysql_connect("webc.cegepsherbrooke.qc.ca", "viauma", "rurove") or die ("Couldn't connect to server");  
mysql_select_db("viauma",  $connexionDB) or die ("Couldn't select database");

$panier = $_SESSION['panier'];
$nbTransaction=0;
$re=mysql_query("select * from transaction order by id DESC limit 1") or die(mysql_error());
while($f=mysql_fetch_array($re)){
	$nbTransaction=$f['id'];
}
if($nbTransaction==0){
	$nbTransaction=1;
}
else{
	$nbTransaction++;
}

mysql_query("insert into transaction (id, id_utilisateur, id_etat_transaction ) values ( 
	".$nbTransaction.",
    10003,
	1)"
	) or die(mysql_error());

for($i=0; $i<count($panier);$i++){
	mysql_query("insert into transaction_produit (id_transaction, id_produit, quantite, sous_total, panier) values ( 
	".$nbTransaction.",
	'".$panier[$i]['Id']."',
	'".$panier[$i]['Quantite']."',
	'".$panier[$i]['Prix']*$panier[$i]['Quantite']."',
	'1'
	) ") or die(mysql_error());	
}

unset($_SESSION['panier']);
header("Location: ../monCompte.php");

?>