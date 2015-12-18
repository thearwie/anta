<?php
	session_start();
	include "conexion.php";
	if(isset($_SESSION['User'])){
		
	}
	else{
		header("Location: ./index.php?Erreur=Accès refusé");
		
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Mon compte</title>
	<link rel="stylesheet" type="text/css" href="./css/stylePanier.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
	<header>
		<h1>Mon compte</h1>
		<a href="./panier.php" title="ver carrito de compras">
			<img src="./img/panier.png">
		</a>
	</header>
	
</body>
</html>