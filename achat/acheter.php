<?php
session_start();
$panier = $_SESSION['panier'];
$user = $_SESSION['User'];

echo '<script type="text/javascript">
	   alert('.$user[0]['Id'].');
	</script>';

//include '../conexion.php';
$connexionDB = mysql_connect("webc.cegepsherbrooke.qc.ca", "viauma", "rurove") or die ("Couldn't connect to server");  
mysql_select_db("viauma",  $connexionDB) or die ("Couldn't select database");

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

mysql_query("insert into transaction (id, id_utilisateur, id_etat_transaction ) values ( ".$nbTransaction.", 10003, 1)") or die(mysql_error());


for($i=0; $i<count($panier);$i++){
	
	mysql_query("insert into transaction_produit (id_transaction, id_produit, quantite, sous_total, panier) values ( 
	".$nbTransaction.",
    'BR-0003-1',
	'".$panier[$i]['Quantite']."',
	'".$panier[$i]['Prix']*$panier[$i]['Quantite']."',
	'1'
	) ") or die(mysql_error());	
}

unset($_SESSION['panier']);
//header("Location: ../monCompte.php");

if(isset($_SESSION['User'])){
	$compteUser = $_SESSION['User'];
	$id = $compteUser[0]['Id'];	
}
echo '<script type="text/javascript">
	   alert('.$id.');
	</script>';

echo '<script type="text/javascript">
	window.location.assign("../monCompte.php?user='.$id.'");
	</script>';

?>