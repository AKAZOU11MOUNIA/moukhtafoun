<?php

namespace App\Entity;

use App\Repository\ArchivesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArchivesRepository::class)]
class Archives
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'archives', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Reclamations $Num_Declaration = null;

    #[ORM\Column(length: 30)]
    private ?string $CIN_ou_Num_passeport_declarant = null;

    #[ORM\Column(length: 100)]
    private ?string $Nom_Complet_Declarant = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $Date_debut_enquete = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $Date_fin_enquete = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumDeclaration(): ?Reclamations
    {
        return $this->Num_Declaration;
    }

    public function setNumDeclaration(Reclamations $Num_Declaration): self
    {
        $this->Num_Declaration = $Num_Declaration;

        return $this;
    }

    public function getCINOuNumPasseportDeclarant(): ?string
    {
        return $this->CIN_ou_Num_passeport_declarant;
    }

    public function setCINOuNumPasseportDeclarant(string $CIN_ou_Num_passeport_declarant): self
    {
        $this->CIN_ou_Num_passeport_declarant = $CIN_ou_Num_passeport_declarant;

        return $this;
    }

    public function getNomCompletDeclarant(): ?string
    {
        return $this->Nom_Complet_Declarant;
    }

    public function setNomCompletDeclarant(string $Nom_Complet_Declarant): self
    {
        $this->Nom_Complet_Declarant = $Nom_Complet_Declarant;

        return $this;
    }

    public function getDateDebutEnquete(): ?\DateTimeImmutable
    {
        return $this->Date_debut_enquete;
    }

    public function setDateDebutEnquete(\DateTimeImmutable $Date_debut_enquete): self
    {
        $this->Date_debut_enquete = $Date_debut_enquete;

        return $this;
    }

    public function getDateFinEnquete(): ?\DateTimeImmutable
    {
        return $this->Date_fin_enquete;
    }

    public function setDateFinEnquete(\DateTimeImmutable $Date_fin_enquete): self
    {
        $this->Date_fin_enquete = $Date_fin_enquete;

        return $this;
    }
}
