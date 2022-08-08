<?php

namespace App\Entity;

use App\Repository\ObjetsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ObjetsRepository::class)]
class Objets
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'objets', targetEntity: Reclamations::class)]
    private Collection $Num_reclamation;

    // #[ORM\Column(length: 40)]
    // private ?string $Option_Objet = null;

    #[ORM\Column(length: 150)]
    private ?string $Objet = null;

    #[ORM\Column(length: 255)]
    private ?string $Description_objet = null;

   
    

    #[ORM\Column(length: 255)]
    private ?string $Lieu_et_ville_de_disparition = null;

    #[ORM\Column(length: 255)]
    private ?string $Decrire_la_situation = null;

    #[ORM\Column(length: 255)]
    private ?string $Images = null;

   


   

    public function __construct()
    {
        $this->Num_reclamation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Reclamations>
     */
    public function getNumReclamation(): Collection
    {
        return $this->Num_reclamation;
    }

    public function addNumReclamation(Reclamations $numReclamation): self
    {
        if (!$this->Num_reclamation->contains($numReclamation)) {
            $this->Num_reclamation[] = $numReclamation;
            $numReclamation->setObjets($this);
        }

        return $this;
    }

    public function removeNumReclamation(Reclamations $numReclamation): self
    {
        if ($this->Num_reclamation->removeElement($numReclamation)) {
            // set the owning side to null (unless already changed)
            if ($numReclamation->getObjets() === $this) {
                $numReclamation->setObjets(null);
            }
        }

        return $this;
    }

    public function getOptionObjet(): ?string
    {
        return $this->Option_Objet;
    }

    public function setOptionObjet(string $Option_Objet): self
    {
        $this->Option_Objet = $Option_Objet;

        return $this;
    }

    public function getObjet(): ?string
    {
        return $this->Objet;
    }

    public function setObjet(string $Objet): self
    {
        $this->Objet = $Objet;

        return $this;
    }

    public function getLieuEtVilleDeDisparition(): ?string
    {
        return $this->Lieu_et_ville_de_disparition;
    }

    public function setLieuEtVilleDeDisparition(string $Lieu_et_ville_de_disparition): self
    {
        $this->Lieu_et_ville_de_disparition = $Lieu_et_ville_de_disparition;

        return $this;
    }

    public function getDescriptionObjet(): ?string
    {
        return $this->Description_objet;
    }

    public function setDescriptionObjet(string $Description_objet): self
    {
        $this->Description_objet = $Description_objet;

        return $this;
    }

    public function getDecrireLaSituation(): ?string
    {
        return $this->Decrire_la_situation;
    }

    public function setDecrireLaSituation(string $Decrire_la_situation): self
    {
        $this->Decrire_la_situation = $Decrire_la_situation;

        return $this;
    }

    public function getImages(): ?string
    {
        return $this->Images;
    }

    public function setImages(string $Images): self
    {
        $this->Images = $Images;

        return $this;
    }
}
