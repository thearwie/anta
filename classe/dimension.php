<?php
  class Dimension
  {
    var $nom;
    var $quantite;
    
    function __construct()
    {
      $this->setNom("");
      $this->setQuantite(0);
    }

    function init($nvNom, $nvQuantite)
    {
      $this->setNom($nvNom);
      $this->setQuantite($nvQuantite);
    }
    
    function setNom($nvNom)
    {
      $this->nom = $nvNom;
    }
    function setQuantite($nvQuantite)
    {
      $this->quantite = $nvQuantite;
    }
    
    function getNom()
    {
      return $this->nom;
    }
    
    function getQuantite()
    {
      return $this->quantite;
    }
  }
?>