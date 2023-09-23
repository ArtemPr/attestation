<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\DevelopersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DevelopersRepository::class)]
class Developers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: System::class, inversedBy: 'developers')]
    /** @phpstan-ignore-next-line */
    private ArrayCollection $system;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $about = null;

    #[ORM\OneToMany(mappedBy: 'developers', targetEntity: Attestation::class)]
    /** @phpstan-ignore-next-line */
    private ArrayCollection $attestation;

    public function __construct()
    {
        $this->system = new ArrayCollection();
        $this->attestation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, System>
     */
    public function getSystem(): Collection
    {
        return $this->system;
    }

    public function addSystem(System $system): static
    {
        if (!$this->system->contains($system)) {
            $this->system->add($system);
        }

        return $this;
    }

    public function removeSystem(System $system): static
    {
        $this->system->removeElement($system);

        return $this;
    }

    public function getAbout(): ?string
    {
        return $this->about;
    }

    public function setAbout(string $about): static
    {
        $this->about = $about;

        return $this;
    }

    /**
     * @return Collection<int, Attestation>
     */
    public function getAttestation(): Collection
    {
        return $this->attestation;
    }

    public function addAttestation(Attestation $attestation): static
    {
        if (!$this->attestation->contains($attestation)) {
            $this->attestation->add($attestation);
            $attestation->setDevelopers($this);
        }

        return $this;
    }

    public function removeAttestation(Attestation $attestation): static
    {
        if ($this->attestation->removeElement($attestation)) {
            // set the owning side to null (unless already changed)
            if ($attestation->getDevelopers() === $this) {
                $attestation->setDevelopers(null);
            }
        }

        return $this;
    }
}
