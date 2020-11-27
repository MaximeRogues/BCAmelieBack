<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AnnonceRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=AnnonceRepository::class)
 * @ApiResource(
 *     denormalizationContext = {"groups" = {"postAllAnnonce"}},
 *     normalizationContext = {"groups" = {"getAllAnnonce"}}
 * )
 */
class Annonce
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
     * @Groups({"getAllAnnonce","postAllAnnonce"})
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"getAllAnnonce","postAllAnnonce"})
     */
    private $descriptionComplete;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"getAllAnnonce","postAllAnnonce"})
     */
    private $anneeMiseEnCirculation;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"getAllAnnonce","postAllAnnonce"})
     */
    private $nombreDeKm;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"getAllAnnonce","postAllAnnonce"})
     */
    private $prixJourLocation;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"getAllAnnonce","postAllAnnonce"})
     */
    private $lieuRetrait;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"getAllAnnonce","postAllAnnonce"})
     */
    private $lieuRestitution;

    /**
     * @ORM\Column(type="date")
     * @Groups({"getAllAnnonce","postAllAnnonce"})
     */
    private $dateCreation;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"getAllAnnonce","postAllAnnonce"})
     */
    private $photo1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"getAllAnnonce","postAllAnnonce"})
     */
    private $photo2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"getAllAnnonce","postAllAnnonce"})
     */
    private $photo3;

    /**
     * @ORM\ManyToOne(targetEntity=Modele::class, inversedBy="annonce")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"getAllAnnonce","postAllAnnonce"})
     */
    private $modele;

    /**
     * @ORM\ManyToOne(targetEntity=Carburant::class, inversedBy="annonce")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"getAllAnnonce","postAllAnnonce"})
     */
    private $carburant;

    /**
     * @ORM\ManyToOne(targetEntity=TypeVehicule::class, inversedBy="annonce")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"getAllAnnonce","postAllAnnonce"})
     */
    private $typeVehicule;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescriptionComplete(): ?string
    {
        return $this->descriptionComplete;
    }

    public function setDescriptionComplete(string $descriptionComplete): self
    {
        $this->descriptionComplete = $descriptionComplete;

        return $this;
    }

    public function getAnneeMiseEnCirculation(): ?int
    {
        return $this->anneeMiseEnCirculation;
    }

    public function setAnneeMiseEnCirculation(int $anneeMiseEnCirculation): self
    {
        $this->anneeMiseEnCirculation = $anneeMiseEnCirculation;

        return $this;
    }

    public function getNombreDeKm(): ?int
    {
        return $this->nombreDeKm;
    }

    public function setNombreDeKm(int $nombreDeKm): self
    {
        $this->nombreDeKm = $nombreDeKm;

        return $this;
    }

    public function getPrixJourLocation(): ?int
    {
        return $this->prixJourLocation;
    }

    public function setPrixJourLocation(int $prixJourLocation): self
    {
        $this->prixJourLocation = $prixJourLocation;

        return $this;
    }

    public function getLieuRetrait(): ?string
    {
        return $this->lieuRetrait;
    }

    public function setLieuRetrait(string $lieuRetrait): self
    {
        $this->lieuRetrait = $lieuRetrait;

        return $this;
    }

    public function getLieuRestitution(): ?string
    {
        return $this->lieuRestitution;
    }

    public function setLieuRestitution(string $lieuRestitution): self
    {
        $this->lieuRestitution = $lieuRestitution;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getPhoto1(): ?string
    {
        return $this->photo1;
    }

    public function setPhoto1(string $photo1): self
    {
        $this->photo1 = $photo1;

        return $this;
    }

    public function getPhoto2(): ?string
    {
        return $this->photo2;
    }

    public function setPhoto2(?string $photo2): self
    {
        $this->photo2 = $photo2;

        return $this;
    }

    public function getPhoto3(): ?string
    {
        return $this->photo3;
    }

    public function setPhoto3(?string $photo3): self
    {
        $this->photo3 = $photo3;

        return $this;
    }

    public function getModele(): ?modele
    {
        return $this->modele;
    }

    public function setModele(?modele $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getCarburant(): ?carburant
    {
        return $this->carburant;
    }

    public function setCarburant(?carburant $carburant): self
    {
        $this->carburant = $carburant;

        return $this;
    }

    public function getTypeVehicule(): ?typeVehicule
    {
        return $this->typeVehicule;
    }

    public function setTypeVehicule(?typeVehicule $typeVehicule): self
    {
        $this->typeVehicule = $typeVehicule;

        return $this;
    }
}
