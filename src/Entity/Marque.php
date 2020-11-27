<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MarqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=MarqueRepository::class)
 */
class Marque
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
     * @ORM\OneToMany(targetEntity=Modele::class, mappedBy="marque", orphanRemoval=true)
     */
    private $modele;

    public function __construct()
    {
        $this->modele = new ArrayCollection();
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

    /**
     * @return Collection|modele[]
     */
    public function getModele(): Collection
    {
        return $this->modele;
    }

    public function addModele(modele $modele): self
    {
        if (!$this->modele->contains($modele)) {
            $this->modele[] = $modele;
            $modele->setMarque($this);
        }

        return $this;
    }

    public function removeModele(modele $modele): self
    {
        if ($this->modele->contains($modele)) {
            $this->modele->removeElement($modele);
            // set the owning side to null (unless already changed)
            if ($modele->getMarque() === $this) {
                $modele->setMarque(null);
            }
        }

        return $this;
    }
}
