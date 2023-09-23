<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AttestationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AttestationRepository::class)]
class Attestation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $result = null;

    #[ORM\ManyToOne(inversedBy: 'attestation')]
    private ?Developers $developers = null;

    #[ORM\OneToMany(mappedBy: 'attestation', targetEntity: AttestationQuestion::class)]
    /** @phpstan-ignore-next-line */
    private ArrayCollection $attestationQuestions;

    public function __construct()
    {
        $this->attestationQuestions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getResult(): ?string
    {
        return $this->result;
    }

    public function setResult(?string $result): static
    {
        $this->result = $result;

        return $this;
    }

    public function getDevelopers(): ?Developers
    {
        return $this->developers;
    }

    public function setDevelopers(?Developers $developers): static
    {
        $this->developers = $developers;

        return $this;
    }

    /**
     * @return Collection<int, AttestationQuestion>
     */
    public function getAttestationQuestions(): Collection
    {
        return $this->attestationQuestions;
    }

    public function addAttestationQuestion(AttestationQuestion $attestationQuestion): static
    {
        if (!$this->attestationQuestions->contains($attestationQuestion)) {
            $this->attestationQuestions->add($attestationQuestion);
            $attestationQuestion->setAttestation($this);
        }

        return $this;
    }

    public function removeAttestationQuestion(AttestationQuestion $attestationQuestion): static
    {
        if ($this->attestationQuestions->removeElement($attestationQuestion)) {
            // set the owning side to null (unless already changed)
            if ($attestationQuestion->getAttestation() === $this) {
                $attestationQuestion->setAttestation(null);
            }
        }

        return $this;
    }
}
