<?php
  class Produit
  {
    var $id;
    var $nom;
    var $quantite;
    var $prix;
    var $commentaire;
    var $enVente;
    var $nouveaute;
    var $typeProduit;

    function __construct()
    {
      $this->setId("");
      $this->setNom("");
      $this->setQuantite(0);
      $this->setPrix(0);
      $this->setCommentaire("");
      $this->setEnVente(0);
      $this->setNouveaute(0);
      $this->$typeProduit = new TypeProduit();
    }

    function init($nvId, $nvNom, $nvQuantite, $nvPrix, $nvCommentaire, $nvEnVente, $nvNouveaute, $idTypeProduit, $nomTypeProduit)
    {
      $this->setId($nvId);
      $this->setNom($nvNom);
      $this->setQuantite($nvQuantite);
      $this->setPrix($nvPrix);
      $this->setCommentaire($nvCommentaire);
      $this->setEnVente($nvEnVente);
      $this->setNouveaute($nvNouveaute);
      $this->setTypeProduit($idTypeProduit, $nomTypeProduit);
    }
    
    function setId($nvId)
    {
      $this->id = $nvId;
    }
    
    function setNom($nvNom)
    {
      $this->nom = $nvNom;
    }
    
    function setQuantite($nvQuantite)
    {
      $this->quantite = $nvQuantite;
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
    
    function getId()
    {
      return $this->id;
    }
    
    function getNom()
    {
      return $this->nom;
    }
    
    function getQuantite()
    {
      return $this->quantite;
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
    
    function printProduction()
    {
      echo"Id: <br/>" . $this->getId() . "<br/>";
      echo"Nom: <br/>" . $this->getNom() . "<br/>";
      echo"Quantité: <br/>" . $this->getQuantite() . "<br/>";
      echo"Prix: <br/>" . $this->getPrix() . "<br/>";
      echo"Commentaire: <br/>" . $this->getCommentaire() . "<br/>";
      echo"Si en vente: <br/>" . $this->getEnVente() . "<br/>";
      echo"Si nouveauté: <br/>" . $this->getNouveaute() . "<br/>";
      echo"Id du type de produit: <br/>" . $this->getTypeProduit()->getId() . "<br/><br/>";
    }
  }
?>