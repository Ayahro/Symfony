<?php

namespace App\Entity;

use App\Repository\StageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StageRepository::class)
 */
class Stage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $intitule;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $duree;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $competencesRequises;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ExperienceRequise;

    /**
     * @ORM\ManyToMany(targetEntity=Formation::class)
     */
    private $Formation;

    /**
     * @ORM\ManyToOne(targetEntity=Entreprise::class, inversedBy="stage")
     */
    private $entreprise;

    public function __construct()
    {
        $this->Formation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): self
    {
        $this->intitule = $intitule;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDateDebut(): ?string
    {
        return $this->dateDebut;
    }

    public function setDateDebut(string $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(?string $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getCompetencesRequises(): ?string
    {
        return $this->competencesRequises;
    }

    public function setCompetencesRequises(?string $competencesRequises): self
    {
        $this->competencesRequises = $competencesRequises;

        return $this;
    }

    public function getExperienceRequise(): ?string
    {
        return $this->ExperienceRequise;
    }

    public function setExperienceRequise(string $ExperienceRequise): self
    {
        $this->ExperienceRequise = $ExperienceRequise;

        return $this;
    }

    /**
     * @return Collection|Formation[]
     */
    public function getFormation(): Collection
    {
        return $this->Formation;
    }

    public function addFormation(Formation $formation): self
    {
        if (!$this->Formation->contains($formation)) {
            $this->Formation[] = $formation;
        }

        return $this;
    }

    public function removeFormation(Formation $formation): self
    {
        $this->Formation->removeElement($formation);

        return $this;
    }

    public function getEntreprise(): ?Entreprise
    {
        return $this->entreprise;
    }

    public function setEntreprise(?Entreprise $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }
}
