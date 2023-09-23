<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AttestationQuestionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AttestationQuestionRepository::class)]
class AttestationQuestion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $result = null;

    #[ORM\ManyToOne(inversedBy: 'attestationQuestions')]
    private ?Attestation $attestation = null;

    #[ORM\ManyToOne(inversedBy: 'attestationQuestions')]
    private ?Question $question = null;

    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isResult(): ?bool
    {
        return $this->result;
    }

    public function setResult(bool $result): static
    {
        $this->result = $result;

        return $this;
    }

    public function getAttestation(): ?Attestation
    {
        return $this->attestation;
    }

    public function setAttestation(?Attestation $attestation): static
    {
        $this->attestation = $attestation;

        return $this;
    }

    public function getQuestion(): ?Question
    {
        return $this->question;
    }

    public function setQuestion(?Question $question): static
    {
        $this->question = $question;

        return $this;
    }
}
