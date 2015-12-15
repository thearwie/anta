<?php
function connectionBD()
{
  $domainName = "webc.cegepsherbrooke.qc.ca";
  $userName = "viauma";
  $password = "rurove";
  $dbName = "viauma";

 $link = mysqli_connect($domainName, $userName, $password, $dbName);

 if (mysqli_connect_errno())
 {
   printf("Échec de la connexion : %s\n", mysqli_connect_error());
   exit();
 }
  return $link;
}
?>