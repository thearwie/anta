<?php
  class Attribut
  {
    var $nom;
    var $valeur;
    var $unite;
    var $description;
    
    function __construct()
    {
      $this->setNom("");
      $this->setValeur("");
      $this->setUnite("");
      $this->setDescription("");
    }

    function init($nvNom, $nvValeur, $nvUnite, $nvDescription)
    {
      $this->setNom($nvNom);
      $this->setValeur($nvValeur);
      $this->setUnite($nvUnite);
      $this->setDescription($nvDescription);
    }
    
    function setNom($nvNom)
    {
      $this->nom = $nvNom;
    }
    
    function setValeur($nvValeur)
    {
      $this->valeur = $nvValeur;
    }
    
    function setUnite($nvUnite)
    {
      $this->unite = $nvUnite;
    }
    
    function setDescription($nvDescription)
    {
      $this->description = $nvDescription;
    }
    
    function getNom()
    {
      return $this->nom;
    }
    
    function getValeur()
    {
      return $this->valeur;
    }
    
    function getUnite()
    {
      return $this->unite;
    }
    
    function getDescription()
    {
      return $this->description;
    }
  }
?>