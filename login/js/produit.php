<?php
  class Produit
  {
    var $id;
    var $nom;
    var $prix;
    var $commentaire;
    var $enVente;
    var $nouveaute;
    var $typeProduit;
    var $dimension;

    function __construct()
    {
      $this->setId("");
      $this->setNom("");
      $this->setPrix(0);
      $this->setCommentaire("");
      $this->setEnVente(0);
      $this->setNouveaute(0);
      $this->typeProduit = new TypeProduit();
      $this->dimension = new Dimension();
    }

    function init($nvId, $nvNom, $nvPrix, $nvCommentaire, $nvEnVente, $nvNouveaute, $idTypeProduit, $nomTypeProduit, $dimension)
    {
      $this->setId($nvId);
      $this->setNom($nvNom);
      $this->setPrix($nvPrix);
      $this->setCommentaire($nvCommentaire);
      $this->setEnVente($nvEnVente);
      $this->setNouveaute($nvNouveaute);
      $this->setTypeProduit($idTypeProduit, $nomTypeProduit);
      $this->setDimension($dimension);
    }
    
    function setId($nvId)
    {
      $this->id = $nvId;
    }
    
    function setNom($nvNom)
    {
      $this->nom = $nvNom;
    }
    
    function setPrix($nvPrix)
    {
      $this->prix = $nvPrix;
    }
    
    function setCommentaire($nvCommentaire)
    {
      $this->commentaire = $nvCommentaire;
    }
    
    function setEnVente($nvEnVente)
    {
      $this->enVente = $nvEnVente;
    }
    
    function setNouveaute($nvNouveaute)
    {
      $this->nouveaute = $nvNouveaute;
    }
    
    function setTypeProduit($idTypeProduit, $nomTypeProduit)
    {
      $this->typeProduit->init($idTypeProduit, $nomTypeProduit);
    }
    
    function setDimension($dimension)
    {
      $this->dimension($dimension);
    }
    
    function getId()
    {
      return $this->id;
    }
    
    function getNom()
    {
      return $this->nom;
    }
    
    function getPrix()
    {
      return $this->prix;
    }
    
    function getCommentaire()
    {
      return $this->commentaire;
    }
    
    function getEnVente()
    {
      return $this->enVente;
    }
    
    function getNouveaute()
    {
      return $this->nouveaute;
    }
    
    function getTypeProduit()
    {
      return $this->typeProduit;
    }
    
    function getDimension()
    {
      return $this->dimension;
    }
    
    function printProduit()
    {
      echo "Id: " . $this->getId() . "<br/>";
      echo "Nom: " . $this->getNom() . "<br/>";
      echo "Prix: " . $this->getPrix() . "<br/>";
      echo "Commentaire: " . $this->getCommentaire() . "<br/>";
      echo "Si en vente: " . $this->getEnVente() . "<br/>";
      echo "Si nouveauté: " . $this->getNouveaute() . "<br/>";
      echo "Id du type de produit: " . $this->getTypeProduit()->getId() . "<br/>";
      for($i = 0; $i < count($this->getDimension()); $i++)
      {
        echo "Dimension " . $i + 1 . " : " . $this->getDimension()[$i]->getNom() . ", quantité :" . $this->getDimension()[$i]->getQuantite() . "<br/>";
      }
      echo "<br/>";
    }
  }
?>