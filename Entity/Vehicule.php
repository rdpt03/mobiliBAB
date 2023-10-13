<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity]
#[ORM\Table(name: "vehicule")]
class Vehicule {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type:"integer")]
    protected $id;
    
    #[ORM\Column(type:"string")]
    protected $libelleV;
    
    #[ORM\Column(type:"string")]
    private $typeV;
        
    #[ORM\ManyToMany(targetEntity:"Formule", mappedBy:"leVehicule")]
    protected ?Collection $lesFormules;

    
    public function __construct() {
        $this->lesFormules = new ArrayCollection();
    }
    
    public function getId() {
        return $this->id;
    }
    public function setId($id): void {
        $this->id = $id;
    }
    
    public function getLibelleV() {
        return $this->libelleV;
    }
    public function setLibelleV($libelleV): void {
        $this->libelleV = $libelleV;
    }
    
    public function getTypeV() {
        return $this->typeV;
    }
    public function setTypeV($typeV): void {
        $this->typeV = $typeV;
    }
    
    public function getLesFormules(): ?Collection {
        return $this->lesFormules;
    }
    public function setLesFormules(?Collection $lesFormules): void {
        $this->lesFormules = $lesFormules;
    }
    
    public function __toString() {
        return $this->libelleV." ".$this->typeV;
    }

}
