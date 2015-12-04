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
$texte = "Boucle d'oreille";
// $texteSansApo = substr($texte, 0, 6) . substr($texte, 9);
// echo $texteSansApo;
echo $texte;

  $indexApostrophe = 0;
  $indexEspace = 0;
  
  for($i = 0; $i < strlen($texte); $i++)
  {
    if($texte[$i] == "'")
    {
      $indexApostrophe = $i;
      echo $indexApostrophe;
      for($y = $indexApostrophe; $y >= 1; $y--)
      {
        if($texte[$y] == " ")
        {
          $indexEspace = $y;
          echo $indexEspace;
          
          //trancher ce qu'il y a entre l'apostrophe (inclusivement) et l'espace (exclusivement)
          $texteSansApo = substr($texte, 0, $indexEspace) . substr($texte, $indexApostrophe+1);
          
          $y = 0;
          $i = $indexEspace;
          break;
        }
      }
    }
  }
echo $texteSansApo . "<br/>"; 
?>
