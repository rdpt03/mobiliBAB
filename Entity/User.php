<?php
namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;
  
    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;
    
     #[ORM\Column(type:"string",nullable:true)]
    private ?string $RIB;
     
      #[ORM\Column(type:"date",nullable:true)]
    private  $dateNaissance;
    
    #[ORM\ManyToOne(targetEntity:"TypeUser", inversedBy:"lesUsers")]
    private ?TypeUser $leTypeUser;
    
    #[ORM\OneToMany(targetEntity:"Achat", mappedBy:"lesUsers")]
    private ?Collection $lesAchats;
    
    function __construct() {
        $this->lesAchats = new ArrayCollection();
    }
   
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = array();
        if ($this->getUnTypeUser()!=null){
            $roles[] = $this->getUnTypeUser()->getLibelleTU();    
        }
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
    
        public function getUnTypeUser() {
        return $this->unTypeUser;
    }

    public function setUnTypeUser($unTypeUser): void {
        $this->unTypeUser = $unTypeUser;
    }
    
    public function getLeTypeUser(): ?TypeUser {
        return $this->leTypeUser;
    }

    public function getLesAchats(): ?Collection {
        return $this->lesAchats;
    }

    public function setLeTypeUser(?TypeUser $leTypeUser): void {
        $this->leTypeUser = $leTypeUser;
    }

    public function setLesAchats(?Collection $lesAchats): void {
        $this->lesAchats = $lesAchats;
    }

    
    public function getRIB(): ?string {
        return $this->RIB;
    }

    public function setRIB(?string $RIB): void {
        $this->RIB = $RIB;
    }

    public function getDateNaissance() {
        return $this->dateNaissance;
    }

    public function setDateNaissance($dateNaissance): void {
        $this->dateNaissance = $dateNaissance;
    }



}
