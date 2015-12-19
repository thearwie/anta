<?php
session_start();
  
  $tableuPanier = $_SESSION['panier'];
  $total=0;
  $nb = 0;	
  for($i=0; $i<count($tableuPanier); $i++){
	  if($tableuPanier[$i]['Id'] == $_POST['Id']){
		$nb = $i;
		
	  }
  }
  $tableuPanier[$nb]['Quantite']=$_POST['Quantite'];
  echo $_POST['Prix'];
  echo $_POST['Quantite'];
  $tableuPanier[$nb]['Quantite']=$_POST['Prix'];
  for($i=0; $i<count($tableuPanier); $i++){

	  $total=$total+($tableuPanier[$i]['Prix']*$tableuPanier[$i]['Quantite']);
	 
  }
  
  $_SESSION['panier']= $tableuPanier;
  echo $total;
  
?>