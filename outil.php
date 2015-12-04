<?php
//Retirer
function formaterTexte($texte = ""){
  echo "TEST <br/>";
  for($i=0; $i<strlen($texte); $i++){
    // echo $texte[$i] . "<br/>";
    echo substr($texte, $i, 1) . "<br/>";
  }
  // echo substr($texte, 0, strlen($texte)) . "<br/>";
}


formaterTexte("test");
?>
