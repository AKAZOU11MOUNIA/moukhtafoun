<?php

namespace App\Entity;

use App\Repository\DeclarantsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DeclarantsRepository::class)]
class Declarants
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $CIN_ou_num_passeport = null;

    #[ORM\Column(length: 100)]
    private ?string $Nom_complet = null;

    #[ORM\OneToMany(mappedBy: 'declarants', targetEntity: Reclamations::class, orphanRemoval: true)]
    private Collection $Num_declaration;

    #[ORM\Column(length: 30)]
    private ?string $type_declaration = null;

    #[ORM\Column(length: 100)]
    private ?string $Ville_actuelle = null;

    #[ORM\Column(length: 20)]
    private ?string $Num_telephone = null;

    #[ORM\Column(length: 255)]
    private ?string $Adresse = null;

    public function __construct()
    {
        $this->reclamations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCINOuNumPasseport(): ?string
    {
        return $this->CIN_ou_num_passeport;
    }

    public function setCINOuNumPasseport(string $CIN_ou_num_passeport): self
    {
        $this->CIN_ou_num_passeport = $CIN_ou_num_passeport;

        return $this;
    }

    public function getNomComplet(): ?string
    {
        return $this->Nom_complet;
    }

    public function setNomComplet(string $Nom_complet): self
    {
        $this->Nom_complet = $Nom_complet;

        return $this;
    }
   
    public function getTypeDeclaration(): ?string
    {
        return $this->type_declaration;
    }

    public function setTypeDeclaration(string $type_declaration): self
    {
        $this->type_declaration = $type_declaration;

        return $this;
    }

    public function getVilleActuelle(): ?string
    {
        return $this->Ville_actuelle;
    }

    public function setVilleActuelle(string $Ville_actuelle): self
    {
        $this->Ville_actuelle = $Ville_actuelle;

        return $this;
    }

    public function getNumTelephone(): ?string
    {
        return $this->Num_telephone;
    }

    public function setNumTelephone(string $Num_telephone): self
    {
        $this->Num_telephone = $Num_telephone;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

   
}