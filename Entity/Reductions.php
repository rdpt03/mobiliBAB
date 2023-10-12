<?php
//FAIT PAR RAFAEL DA SILVA
namespace App\Entity;
#[ORM\Entity]
#[ORM\Table(name: "reductions")]


class Reductions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private $id;
    #[ORM\Column(type: "datetime")]
    private $ageDebutReduc;
    #[ORM\Column(type: "datetime")]
    private $ageFinReduc;
    #[ORM\Column(type: "double")]
    private $montantReduc;








    //getters e setters



    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }


    /**
     * @return mixed
     */
    public function getAgeDebutReduc()
    {
        return $this->ageDebutReduc;
    }

    /**
     * @param mixed $ageDebutReduc
     */
    public function setAgeDebutReduc($ageDebutReduc): void
    {
        $this->ageDebutReduc = $ageDebutReduc;
    }

    /**
     * @return mixed
     */
    public function getAgeFinReduc()
    {
        return $this->ageFinReduc;
    }

    /**
     * @param mixed $ageFinReduc
     */
    public function setAgeFinReduc($ageFinReduc): void
    {
        $this->ageFinReduc = $ageFinReduc;
    }

    /**
     * @return mixed
     */
    public function getMontantReduc()
    {
        return $this->montantReduc;
    }

    /**
     * @param mixed $montantReduc
     */
    public function setMontantReduc($montantReduc): void
    {
        $this->montantReduc = $montantReduc;
    }

    public function __toString(): string
    {
        return $this->ageDebutReduc." ".$this->ageFinReduc." ".$this->montantReduc;
    }


}
