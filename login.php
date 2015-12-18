<!DOCTYPE html>
<head>
	<meta charset="utf-8"/>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/stylePanier.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript"  href="js/scripts.js"></script>
</head>
<body>
	<header>
		
	</header>
	<section>
	<form id="formulaire" method="post" action="./login/verifier.php">
	    <?php 
		  if(isset($_GET['erreur'])){
			  echo '<center>Données invalides</center>';
		  }
		?>
		<label for="courriel">Adresse courriel</label><br>
		<input type="text" id="courriel" name="Courriel" placeholder="courriel" size="60" ><br>
		<label for="password">Mot de passe</label><br>
		<input type="password" id="password" name="Password" placeholder="mot de passe" size="60"><br>
		<input type="submit" name="ouvrirSession" value="Ouvrir Session" class="ouvrirSession">
	</form>
	</section>
</body>
</html>