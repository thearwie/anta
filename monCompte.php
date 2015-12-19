<?php
	session_start();
	//include "conexion.php";
	
	$connexionDB = mysql_connect("webc.cegepsherbrooke.qc.ca", "viauma", "rurove") or die ("Couldn't connect to server");  
	mysql_select_db("viauma",  $connexionDB) or die ("Couldn't select database");
	
	
	if(isset($_SESSION['User'])){
		$user = $_SESSION['User'];
		echo '<script type="text/javascript">
	   alert("Hola2");
	   </script>';
	}
	else{
		//header("Location: ./index.php?Erreur=Accès refusé");
	   echo '<script type="text/javascript">
	   alert("Hola3");
	   </script>';
		
		echo '<script type="text/javascript">
	         window.location.assign("../index.php?Erreur=Accès refusé");
			 </script>';
		
	}
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8"/>
	<title>Mon compte</title>
	<link rel="stylesheet" type="text/css" href="css/stylePanier.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript"  href="js/scripts.js"></script>
</head>
<body>
	<header>
	    <?php
		 // $id = $_GET['user'];
		  $id = $user[0]['Id'];
		  $re=mysql_query("select * from utilisateur where id='".$id."'");
		  while ($f=mysql_fetch_array($re)) {	
				echo '<h2>Mon compte: '.$f['prenom'].' '.$f['nom'].' </h2>';
		  }
		?>
	
		<a href="./panier.php" title="panier">
			<img src="./img/panier.png">
		</a>
	</header>
		<section>
	<nav class="menu2">
	  <menu>
	    <li><a href="./">Accueil</a></li>
	    <li><a href="#" class="selected">Mon Compte</a></li>
	    <li><a href="./login/fermer.php">Quitter</a></li>
	  </menu>
	</nav>

	<center><h1>Derniers achats</h1></center>
	<table border="0px" width="100%">	
		<tr>
			<td>Image</td>
			<td>Nom</td>
			<td>Prix</td>
			<td>Quantite</td>
			<td>Sous-total</td>
		</tr>	

		<?php
		    $id = $_GET['user'];
			$re=mysql_query("select t.id, p.id as idProduit, p.nom, p.prix, tp.quantite, tp.sous_total 
							from transaction t, transaction_produit tp, produit p, utilisateur u
							where t.id = tp.id_transaction and 
								  tp.id_produit = p.id and 
								  u.id = t.id_utilisateur and
								  u.courriel ='".$id."'  
							order by t.id");
			$nbAchat=0;
			while ($f=mysql_fetch_array($re)) {
					if($nbAchat	!=$f['id']){
						echo '<tr><td>Nombre de transaction: '.$f['id'].' </td></tr>';
					}
					$nbAchat=$f['id'];
					echo '<tr>
						<td><img src="./img/'.$f['idProduit'].".jpg".'" width="100px" heigth="100px" /></td>
						<td>'.$f['nom'].'</td>
						<td>'.$f['prix'].'</td>
						<td>'.$f['quantite'].'</td>
						<td>'.$f['sous_total'].'</td>

					</tr>';
			}
		?>
	</table>
	</section>
	
</body>
</html>