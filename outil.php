<?php
//Retirer
function formaterTexte($texte = "")
{
  echo "TEST <br/>";
  for($i=0; $i<strlen($texte); $i++)
  {
    echo $texte[$i] . "<br/>";
    // echo substr($texte, $i, 1) . "<br/>";
  }
  // echo substr($texte, 0, strlen($texte)) . "<br/>";
  return $texte;
}
$texte = formaterTexte("Boucle d'oreille");

  $indexApostrophe = 0;
  $indexEspace = 0;
  
  $i = 0;
  while($i<strlen($texte))
  {
    if($texte[$i] == "\'")
    {
      $indexApostrophe = $i;
      for($y=$i; $y>0; $y--)
      {
        if($texte[$y] == " ")
        {
          $indexEspace = $y;
          $y = 0;
          $i = -1;
        }
      }
      //trancher ce qu'il y a entre l'apostrophe et l'espace
      $texteSansApo = substr($texte, 0, $indexEspace) + substr($texte, $indexApostrophe+1, ($indexApostrophe+2) - strlen($texte));
    }
    $i++;
  }
echo "<br/>";
$texteSansApo = formaterTexte($substr($texte, 0, $indexEspace));
?>
