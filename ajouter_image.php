<?php
$q = $_REQUEST["q"];
$image = "image" . $q;
$uploadImage = "uploadImage" . $q;
?>

<div class="cellule">
  <div>
    <img id="<?php echo $image;?>" class="photo_produit" />
  </div>
  <br/>
  <input id="<?php echo $uploadImage;?>" type="file" name="myPhoto" onchange='PreviewImage("<?php echo $image . '", "' .$uploadImage;?>");' accept="image/*"/>
</div>