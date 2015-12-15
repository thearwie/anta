<?php
// ini_set("display_errors", 1);
  class TypeProduit
  {
    var $id;
    var $nom;
    var $abreviation;

    function __construct()
    {
      $this->setId(0);
      $this->setNom("");
      $this->setAbreviation("");
    }

    function init($nvId, $nvNom)
    {
      $this->setId($nvId);
      $this->setNom($nvNom);
      $this->setAbreviation("");
    }
    
    function initialiser($nvId, $nvNom, $nvAbreviation)
    {
      $this->setId($nvId);
      $this->setNom($nvNom);
      $this->setAbreviation($nvAbreviation);
    }
    
    function setId($nvId)
    {
      $this->id = $nvId;
    }
    
    function setNom($nvNom)
    {
      $this->nom = $nvNom;
    }
    
    function setAbreviation($nvAbreviation)
    {
      $this->abreviation = $nvAbreviation;
    }
    
    function getId()
    {
      return $this->id;
    }
    
    function getNom()
    {
      return $this->nom;
    }
    
    function getAbreviation()
    {
      return $this->abreviation;
    }
    
    function printTypeProduit()
    {
      echo "Id: " . $this->getId() . "<br/>";
      echo "Nom: " . $this->getNom() . "<br/>";
      echo "Abreviation: " . $this->getAbreviation() . "<br/>";
    }
  }
?>