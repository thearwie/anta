<?php
//formate le texte
function formaterTexte($texte = "")
{
  $texte = retirerApostrophe($texte);
  $texte = convertirCaractere($texte, ' ', '_');
  $texte = convertirMinuscule($texte);
  
  return $texte;
}
  
//Fonction qui tranche ce qu'il y a entre l'apostrophe et l'espace
function retirerApostrophe($texte = "")
{
  $indexApostrophe = 0;
  $indexEspace = 0;

  for($i = 0; $i < strlen($texte); $i++)
  {
    if($texte[$i] == "'")
    {
      $indexApostrophe = $i;

      for($y = $indexApostrophe; $y > 0; $y--)
      {
        if($texte[$y] == " ")
        {
          $indexEspace = $y;
    
          //$indexEspace+1, car le 0 compte  //$indexApostrophe+1, car on ne veut pas l'apostrophe
          $texte = substr($texte, 0, $indexEspace+1) . substr($texte, $indexApostrophe+1);
          
          $i = 0;
          break;
        }
      }
    }
  }
  
  return $texte;
}

//Convertion d'un caractère en un autre, pour tout le texte
function convertirCaractere($texte, $aConvertir, $convertion)
{
  for($i = 0; $i < strlen($texte); $i++)
  {
    if($texte[$i] == $aConvertir)
    {
      $texte[$i] = $convertion;
    }
  }
  
  return $texte;
}

//Convertion du texte en minuscule
function convertirMinuscule($texte = "")
{
  for($i=0; $i<strlen($texte); $i++)
  {
    if(ord($texte[$i]) >= 65 && ord($texte[$i]) <= 90)
    {
      $texte[$i] = chr(ord($texte[$i])+32);
    }
  }
  
  return $texte;
}

//Convertion du texte en Majuscule
function convertirMajuscule($texte = "")
{
  for($i=0; $i<strlen($texte); $i++)
  {
    if(ord($texte[$i]) >= 97 && ord($texte[$i]) <= 122)
    {
      $texte[$i] = chr(ord($texte[$i])-32);
    }
  }
  
  return $texte;
}

?>
