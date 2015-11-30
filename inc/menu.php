<?php
/**

 */
?>

<ul>
  <li><a href='index.php' <?php if($page == 'index') echo 'class="selected"'?>>Accueil</a></li>
  <li><a href='creations.php' <?php if($page == 'creations') echo 'class="selected"'?>>Créations</a></li>
  <li><a href='collections.php' <?php if($page == 'collections') echo 'class="selected"'?>>Collections</a></li>
  <li><a href='services.php' <?php if($page == 'services') echo 'class="selected"'?>>Service</a></li>
  <li><a href='nousJoindre.php' <?php if($page == 'nousJoindre') echo 'class="selected"'?>>Nous joindre</a></li>
</ul>