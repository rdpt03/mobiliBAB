<?php
namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: 'formule')]
class Formule {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    protected $id;
    
    #[ORM\Column(type:"string",nullable:true)]
    protected string $nomF;
    
    #[ORM\Column(type: "int",nullable:true)]
    protected int $prixAbo;

    #[ORM\ManyToOne(targetEntity:"Vehicules", mappedBy:"lesFormules")]
    protected $lesVehicules; //LIASON vers Vehicule 0*
    
    #[ORM\OneToMany(targetEntity:"Catalogues", mappedBy:"lesFormules")]
    protected $lesCataloguesNecessaires;//LIASON VERS Catalogue 0*
    
    #[ORM\OneToMany(targetEntity:"Achat", mappedBy:"laFormule")]
    protected $lesSouscriptions; //LIASON VERS Souscrire 0*
    

    //CONSTRUCT
    public function __construct() {
        $this->lesVehicules = array();
        $this->lesCataloguesNecessaires = new ArrayCollection();
        $this->lesSouscriptions = new ArrayCollection();
    }




    //GETTERS AND SETTERS 
    public function getId() {
        return $this->id;
    }

    public function getNomF() {
        return $this->nomF;
    }

    public function getPrixAbo() {
        return $this->prixAbo;
    }

    public function getLesVehicules() {
        return $this->lesVehicules;
    }

    public function getLesCataloguesNecessaires() {
        return $this->lesCataloguesNecessaires;
    }

    public function getLesSouscriptions() {
        return $this->lesSouscriptions;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setNomF($nomF): void {
        $this->nomF = $nomF;
    }

    public function setPrixAbo($prixAbo): void {
        $this->prixAbo = $prixAbo;
    }

    public function setLesVehicules($lesVehicules): void {
        $this->lesVehicules = $lesVehicules;
    }

    public function setLesCataloguesNecessaires($lesCataloguesNecessaires): void {
        $this->lesCataloguesNecessaires = $lesCataloguesNecessaires;
    }

    public function setLesSouscriptions($lesSouscriptions): void {
        $this->lesSouscriptions = $lesSouscriptions;
    }

    
    //TOSTRING
    public function __toString() {
        return $this->nom+" "+$ths->prixAbo;
    }


}
