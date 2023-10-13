<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "souscrire")]
class Souscrire {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    protected $id;

    #[ORM\Column(type: "date")]
    protected $DateDebutValid;
    
    #[ORM\Column(type: "date")]
    protected $DateFinValid;
    
       #[ORM\ManyToOne(targetEntity:"Formule", inversedBy:"LesSouscriptions")]
    private ?Formule $LaFormule;
       
          #[ORM\ManyToOne(targetEntity:"User", inversedBy:"LesSouscriptions")]
    private ?User $leUser;
    
 
    public function getId(): int {
        return $this->id;
    }

    public function getDateDebutValid() {
        return $this->DateDebutValid;
    }

    public function getDateFinValid() {
        return $this->DateFinValid;
    }

    public function setDateDebutValid($DateDebutValid): void {
        $this->DateDebutValid = $DateDebutValid;
    }

    public function setDateFinValid($DateFinValid): void {
        $this->DateFinValid = $DateFinValid;
    }
    
    public function getLaFormule(): ?Formule {
        return $this->LaFormule;
    }

    public function getLeUser(): ?User {
        return $this->leUser;
    }

    public function setLaFormule(?Formule $LaFormule): void {
        $this->LaFormule = $LaFormule;
    }

    public function setLeUser(?User $leUser): void {
        $this->leUser = $leUser;
    }

    
        public function __toString() {
        return $this->getId()." ".$this->getDateDebutValid()->format("Y-m-d")." ".$this->getDateFinValid()->format("Y-m-d");
    }
}
