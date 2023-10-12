<?php
namespace App\Entity;


#[ORM\Entity]
#[ORM\Table(name:"achat")]
class Achat {
     #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type:"integer")]
    private int $id;
    #[ORM\Column(type:"date",nullable:true)]
    private  $dateA;
   #[ORM\ManyToOne(targetEntity:"Catalogue", inversedBy:"lesAchats")]
    private Catalogue $leCatalogue;
    #[ORM\ManyToOne(targetEntity:"User", inversedBy:"lesAchats")]
    private User $leUser;

    
    public function getId() {
        return $this->id;
    }

    public function getDateA() {
        return $this->dateA;
    }


    public function setId($id): void {
        $this->id = $id;
    }

    public function setDateA($dateA): void {
        $this->dateA = $dateA;
    }

    public function getLeCatalogue(): Catalogue {
        return $this->leCatalogue;
    }

    public function getLeUser(): User {
        return $this->leUser;
    }

    public function setLeCatalogue(Catalogue $leCatalogue): void {
        $this->leCatalogue = $leCatalogue;
    }

    public function setLeUser(User $leUser): void {
        $this->leUser = $leUser;
    }

    
    public function __toString() {
        return $this->id." ".$this->dateA;
    }


}
