<?php
  session_start();
  include './conexion.php';
  if(isset($_SESSION['panier'])){
	  if(isset($_GET['id'])){
	  
	  $tableuPanier = $_SESSION['panier'];
	  $trouve = false;
	  $nb = 0;	
	 
	  for($i=0; $i<count($tableuPanier); $i++){
		  if($tableuPanier[$i]['Id'] == $_GET['id']){
			$trouve = true;
			$nb = $i;
		  }
	  }
	  if($trouve==true){
		   $tableuPanier[$nb]['Quantite']=$tableuPanier[$nb]['Quantite']+1;
		   $_SESSION['panier']=$tableuPanier;
	  }
	  else{
		  $tableuPanierAdd = array();
		  $nom = "";
		  $prix=0;
		  $image="";
		  $re = mysql_query("select * from produit where id='".$_GET['id']."'");
		  while ($f=mysql_fetch_array($re)){
			$id= $f['id'];
			$nom= $f['nom'];
			$prix= $f['prix'];
			$image= $f['id'];
			
		  }
		  $tableuPanierAdd=array('Id'=>$id,
								'Nom'=>$nom,
								'Prix'=>$prix,
								'Image'=>$image,
								'Quantite'=>1);
								
		  array_push($tableuPanier, $tableuPanierAdd);
		  $_SESSION['panier']=$tableuPanier;
	  }
	} 
  }
  else{
	  if(isset($_GET['id'])){
		  $tableuPanier = array();
		  $nom = "";
		  $prix=0;
		  $image="";
		  $re = mysql_query("select * from produit where id='".$_GET['id']."'");
		  while ($f=mysql_fetch_array($re)){
			$id= $f['id'];
			$nom= $f['nom'];
			$prix= $f['prix'];
			$image= $f['id'];
			
		  }
		  $tableuPanier[]=array('Id'=>$id,
								'Nom'=>$nom,
								'Prix'=>$prix,
								'Image'=>$image,
								'Quantite'=>1);
		
		 $_SESSION['panier']=$tableuPanier;
	  } 
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Panier</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript"  src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript"  src="./js/scripts.js"></script>
</head>
<body>
	<header>
		<h1>Panier</h1>
		<a href="./panier.php" title="panier">
			<img src="./img/panier.png">
		</a>
	</header>

</body>
</html>