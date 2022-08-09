<?php

namespace App\Entity;

use App\Repository\TemoignagesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TemoignagesRepository::class)]
class Temoignages
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'temoignages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Reclamations $Num_declaration = null;

    #[ORM\Column(length: 30)]
    private ?string $CIN_ou_Num_passeport = null;

    #[ORM\Column(length: 100)]
    private ?string $Nom_complet = null;

    #[ORM\Column(length: 40)]
    private ?string $Type_temoignage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumDeclaration(): ?string
    {
        return $this->Num_declaration;
    }

    public function setNumDeclaration(?string $Num_declaration): self
    {
        $this->Num_declaration = $Num_declaration;

        return $this;
    }

    public function getCINOuNumPasseport(): ?string
    {
        return $this->CIN_ou_Num_passeport;
    }

    public function setCINOuNumPasseport(string $CIN_ou_Num_passeport): self
    {
        $this->CIN_ou_Num_passeport = $CIN_ou_Num_passeport;

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

    public function getTypeTemoignage(): ?string
    {
        return $this->Type_temoignage;
    }

    public function setTypeTemoignage(string $Type_temoignage): self
    {
        $this->Type_temoignage = $Type_temoignage;

        return $this;
    }
}
