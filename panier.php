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
    	<section>
		<?php
		  $totalPanier = 0;
		  if(isset($_SESSION['panier'])){
			  $contenuPanier = $_SESSION['panier'];
			 
			  for($i=0; $i<count($contenuPanier); $i++){
		?>
			<div class= "produit">
			    <center>
				  <img src="./img/<?php echo $contenuPanier[$i]['Id'];?>.jpg "></br>
				  <span><?php echo $contenuPanier[$i]['Nom'];?></span></br>
				  <span>Prix: <?php echo $contenuPanier[$i]['Prix'];?></span></br>
				  <span>Quantité: 
					<input type="text" value="<?php echo $contenuPanier[$i]['Quantite'];?>"
					data-prix="<?php echo $contenuPanier[$i]['Prix'];?>"
					data-id="<?php echo $contenuPanier[$i]['Id'];?>"
					class="quantite">
				  </span></br>
				  <span class="sous-total">Sous-total: <?php echo $contenuPanier[$i]['Prix']*$contenuPanier[$i]['Quantite'];?></span></br>
				</center>
			</div>

		<?php
		    $totalPanier = ($contenuPanier[$i]['Prix']*$contenuPanier[$i]['Quantite'])+$totalPanier;
			
			}
		  }
		  else{
			  echo '<center><h2>Le panier est vide</h2></center>';
		  }
		 
		  echo '<center><h2 id="total">Total: '.$totalPanier.'</h2></center>';
		  
		  if($totalPanier!=0){
				echo '<center><a href="./achat/acheter.php" class="acheter">Acheter</a></center>';
		  }
		?>
	    
		<center><a href="./collections">Continuer à magasiner</a></center>
		
	</section>
</body>
</html>