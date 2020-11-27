<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TypeVehiculeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=TypeVehiculeRepository::class)
 */
class TypeVehicule
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"getAllAnnonce"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"getAllAnnonce"})
     */
    private $nom;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"getAllAnnonce"})
     */
    private $nbrRoues;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"getAllAnnonce"})
     */
    private $aMoteur;

    /**
     * @ORM\OneToMany(targetEntity=Annonce::class, mappedBy="typeVehicule", orphanRemoval=true)
     */
    private $annonce;

    public function __construct()
    {
        $this->annonce = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNbrRoues(): ?int
    {
        return $this->nbrRoues;
    }

    public function setNbrRoues(int $nbrRoues): self
    {
        $this->nbrRoues = $nbrRoues;

        return $this;
    }

    public function getAMoteur(): ?bool
    {
        return $this->aMoteur;
    }

    public function setAMoteur(bool $aMoteur): self
    {
        $this->aMoteur = $aMoteur;

        return $this;
    }

    /**
     * @return Collection|Annonce[]
     */
    public function getAnnonce(): Collection
    {
        return $this->annonce;
    }

    public function addAnnonce(Annonce $annonce): self
    {
        if (!$this->annonce->contains($annonce)) {
            $this->annonce[] = $annonce;
            $annonce->setTypeVehicule($this);
        }

        return $this;
    }

    public function removeAnnonce(Annonce $annonce): self
    {
        if ($this->annonce->contains($annonce)) {
            $this->annonce->removeElement($annonce);
            // set the owning side to null (unless already changed)
            if ($annonce->getTypeVehicule() === $this) {
                $annonce->setTypeVehicule(null);
            }
        }

        return $this;
    }
}
