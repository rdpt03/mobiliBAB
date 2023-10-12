<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity]
#[ORM\Table(name:"catalogue")]
class Test{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type:"integer")]
    private int $id;
    
    #[ORM\Column(type:"integer",nullable:true)]
    private ?int $PrixCatalogue;
    
    #[ORM\Column(type:"string",nullable:true)]
    private $libelleCatalogue;
    
    
    //CONNECTIONS
    
    #[ORM\OneToMany(targetEntity:"Achat", mappedBy:"lesCatalogues")]
    private ?Collection $lesAchats;
    
    #[ORM\ManyToMany(targetEntity:"Formule", mappedBy:"lesCatalogues")]
    private ?Collection $lesFormules;
    
    function __construct() {
        $this->lesFormules = new ArrayCollection();
    }
    
    
    //----------GETTERS AND SETTERS----------//
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getPrixCatalogue(): ?string {
        return $this->PrixCatalogue;
    }

    public function getLibelleCatalogue() {
        return $this->libelleCatalogue;
    }

    public function getLesAchats(): ?Collection {
        return $this->lesAchats;
    }

    public function getLesFormules(): ?Collection {
        return $this->lesFormules;
    }

    public function setPrixCatalogue(?string $PrixCatalogue): void {
        $this->PrixCatalogue = $PrixCatalogue;
    }

    public function setLibelleCatalogue($libelleCatalogue): void {
        $this->libelleCatalogue = $libelleCatalogue;
    }

    public function setLesAchats(?Collection $lesAchats): void {
        $this->lesAchats = $lesAchats;
    }

    public function setLesFormules(?Collection $lesFormules): void {
        $this->lesFormules = $lesFormules;
    }

      
    public function __toString() {
        return $this->critique." ".$this->leProjet->getNomP();
        
    } 
}

