<?php
namespace App\Entity;
use App\Repository\PersonnePerdueRepository;
use Container5e2gSrg\getDebug_ArgumentResolver_DatetimeService;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonnePerdueRepository::class)]
class PersonnePerdue
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $CIN_ou_Num_passeport = null;

    #[ORM\Column(length: 100)]
    private ?string $Nom_complet = null;

    #[ORM\OneToMany(mappedBy: 'personnePerdue', targetEntity: Reclamations::class)]
    private Collection $Num_declaration;

    #[ORM\Column(length: 3)]
    private ?string $Age = null;

    #[ORM\Column(length: 10)]
    private ?string $Sexe = null;

    #[ORM\Column(length: 40)]
    private ?string $Lien_Familiale_Avec_Declarant = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $Periode_de_disparition = null;

    #[ORM\Column(length: 255)]
    private ?string $Ville_et_lieu_de_disparition = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    public function __construct()
    {
        $this->Num_declaration = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCINOuNumPasseport(): ?string
    {
        return $this->CIN_ou_Num_passeport;
    }

    public function setCINOuNumPasseport(?string $CIN_ou_Num_passeport): self
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

    /**
     * @return Collection<int, Reclamations>
     */
    public function getNumDeclaration(): Collection
    {
        return $this->Num_declaration;
    }

    public function addNumDeclaration(Reclamations $numDeclaration): self
    {
        if (!$this->Num_declaration->contains($numDeclaration)) {
            $this->Num_declaration[] = $numDeclaration;
            $numDeclaration->setPersonnePerdue($this);
        }

        return $this;
    }

    public function removeNumDeclaration(Reclamations $numDeclaration): self
    {
        if ($this->Num_declaration->removeElement($numDeclaration)) {
            // set the owning side to null (unless already changed)
            if ($numDeclaration->getPersonnePerdue() === $this) {
                $numDeclaration->setPersonnePerdue(null);
            }
        }

        return $this;
    }

    public function getAge(): ?string
    {
        return $this->Age;
    }

    public function setAge(string $Age): self
    {
        $this->Age = $Age;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->Sexe;
    }

    public function setSexe(string $Sexe): self
    {
        $this->Sexe = $Sexe;

        return $this;
    }

    public function getLienFamilialeAvecDeclarant(): ?string
    {
        return $this->Lien_Familiale_Avec_Declarant;
    }

    public function setLienFamilialeAvecDeclarant(string $Lien_Familiale_Avec_Declarant): self
    {
        $this->Lien_Familiale_Avec_Declarant = $Lien_Familiale_Avec_Declarant;

        return $this;
    }

    public function getPeriodeDeDisparition(): ?\DateTimeImmutable
    {
        return $this->Periode_de_disparition;
    }


    public function setPeriodeDeDisparition(?\DateTimeImmutable $Periode_de_disparition): self

    {
        $this->Periode_de_disparition = $Periode_de_disparition;

        return $this;
    }

    public function getVilleEtLieuDeDisparition(): ?string
    {
        return $this->Ville_et_lieu_de_disparition;
    }

    public function setVilleEtLieuDeDisparition(string $Ville_et_lieu_de_disparition): self
    {
        $this->Ville_et_lieu_de_disparition = $Ville_et_lieu_de_disparition;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }
    public function getImagePath()
    {
        return 'public/images/'.$this->getImage();
    }
}