<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuestionRepository::class)]
class Question
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $question = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $answer = null;

    #[ORM\ManyToOne(inversedBy: 'questions')]
    private ?Type $type = null;

    #[ORM\ManyToOne(inversedBy: 'questions')]
    private ?Level $level = null;

    #[ORM\ManyToMany(targetEntity: System::class, inversedBy: 'questions')]
    /** @phpstan-ignore-next-line */
    private ArrayCollection $system;

    #[ORM\OneToMany(mappedBy: 'question', targetEntity: AttestationQuestion::class)]
    /** @phpstan-ignore-next-line */
    private ArrayCollection $attestationQuestions;

    public function __construct()
    {
        $this->system = new ArrayCollection();
        $this->attestationQuestions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): static
    {
        $this->question = $question;

        return $this;
    }

    public function getAnswer(): ?string
    {
        return $this->answer;
    }

    public function setAnswer(?string $answer): static
    {
        $this->answer = $answer;

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getLevel(): ?Level
    {
        return $this->level;
    }

    public function setLevel(?Level $level): static
    {
        $this->level = $level;

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
            $attestationQuestion->setQuestion($this);
        }

        return $this;
    }

    public function removeAttestationQuestion(AttestationQuestion $attestationQuestion): static
    {
        if ($this->attestationQuestions->removeElement($attestationQuestion)) {
            // set the owning side to null (unless already changed)
            if ($attestationQuestion->getQuestion() === $this) {
                $attestationQuestion->setQuestion(null);
            }
        }

        return $this;
    }
}
