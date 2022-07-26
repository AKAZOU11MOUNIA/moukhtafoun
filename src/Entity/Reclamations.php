<?php

namespace App\Entity;

use App\Repository\ReclamationsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReclamationsRepository::class)]
class Reclamations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $Type_reclamation = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $Date_de_reclamation = null;

    #[ORM\ManyToOne(inversedBy: 'Num_declaration')]
    private ?PersonnePerdue $personnePerdue = null;

    #[ORM\ManyToOne(inversedBy: 'Num_reclamation')]
    private ?Objets $objets = null;

    #[ORM\OneToMany(mappedBy: 'Num_declaration', targetEntity: Temoignages::class)]
    private Collection $temoignages;

    #[ORM\OneToOne(mappedBy: 'Num_Declaration', cascade: ['persist', 'remove'])]
    private ?Archives $archives = null;

    #[ORM\ManyToOne(inversedBy: 'reclamations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Declarants $Num_declaration = null;

    public function __construct()
    {
        $this->temoignages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeReclamation(): ?string
    {
        return $this->Type_reclamation;
    }

    public function setTypeReclamation(string $Type_reclamation): self
    {
        $this->Type_reclamation = $Type_reclamation;

        return $this;
    }

    public function getDateDeReclamation(): ?\DateTimeImmutable
    {
        return $this->Date_de_reclamation;
    }

    public function setDateDeReclamation(\DateTimeImmutable $Date_de_reclamation): self
    {
        $this->Date_de_reclamation = $Date_de_reclamation;

        return $this;
    }


    public function getPersonnePerdue(): ?PersonnePerdue
    {
        return $this->personnePerdue;
    }

    public function setPersonnePerdue(?PersonnePerdue $personnePerdue): self
    {
        $this->personnePerdue = $personnePerdue;

        return $this;
    }

    public function getObjets(): ?Objets
    {
        return $this->objets;
    }

    public function setObjets(?Objets $objets): self
    {
        $this->objets = $objets;

        return $this;
    }

    /**
     * @return Collection<int, Temoignages>
     */
    public function getTemoignages(): Collection
    {
        return $this->temoignages;
    }

    public function addTemoignage(Temoignages $temoignage): self
    {
        if (!$this->temoignages->contains($temoignage)) {
            $this->temoignages[] = $temoignage;
            $temoignage->setNumDeclaration($this);
        }

        return $this;
    }

    public function removeTemoignage(Temoignages $temoignage): self
    {
        if ($this->temoignages->removeElement($temoignage)) {
            // set the owning side to null (unless already changed)
            if ($temoignage->getNumDeclaration() === $this) {
                $temoignage->setNumDeclaration(null);
            }
        }

        return $this;
    }

    public function getArchives(): ?Archives
    {
        return $this->archives;
    }

    public function setArchives(Archives $archives): self
    {
        // set the owning side of the relation if necessary
        if ($archives->getNumDeclaration() !== $this) {
            $archives->setNumDeclaration($this);
        }

        $this->archives = $archives;

        return $this;
    }

    public function getNumDeclaration(): ?Declarants
    {
        return $this->Num_declaration;
    }

    public function setNumDeclaration(?Declarants $Num_declaration): self
    {
        $this->Num_declaration = $Num_declaration;

        return $this;
    }
}