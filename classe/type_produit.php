<?php
  class TypeProduit
  {
    var $id;
    var $nom;

    function __construct()
    {
      $this->setId(0);
      $this->setNom("");
    }

    function init($nvId, $nvNom)
    {
      $this->setId($nvId);
      $this->setNom($nvNom);
    }
    
    function setId($nvId)
    {
      $this->id = $nvId;
    }
    
    function setNom($nvNom)
    {
      $this->nom = $nvNom;
    }
    
    function getId()
    {
      return $this->id;
    }
    
    function getNom()
    {
      return $this->nom;
    }
    
    function printTypeProduit()
    {
      echo"Id: " . $this->getId() . "<br/>";
      echo"Nom: " . $this->getNom() . "<br/><br/>";
    }
  }
?>