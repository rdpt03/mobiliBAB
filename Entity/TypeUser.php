<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "typeuser")]
class TypeUser {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    protected $id;

    #[ORM\Column(type: "string")]
    protected $libelleTU;
    
    #[ORM\OneToMany(targetEntity:"User", mappedBy:"lesUsers")]
    private ?Collection $lesUsers;

    public function getId(): int {
        return $this->id;
    }

    public function getLibelleTU(): string {
        return $this->libelleTU;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setLibelleTU(string $libelleTU): void {
        $this->libelleTU = $libelleTU;
    }
    
    public function getLesUsers(): ?Collection {
        return $this->lesUsers;
    }

    public function setLesUsers(?Collection $lesUsers): void {
        $this->lesUsers = $lesUsers;
    }

    
    public function __toString() {
        return $this->getLibelleTU();
    }
}
