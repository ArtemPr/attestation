<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\SystemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SystemRepository::class)]
class System
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: Question::class, mappedBy: 'system')]
    /** @phpstan-ignore-next-line */
    private ArrayCollection $questions;

    #[ORM\ManyToMany(targetEntity: Developers::class, mappedBy: 'system')]
    /** @phpstan-ignore-next-line */
    private ArrayCollection $developers;

    public function __construct()
    {
        $this->questions = new ArrayCollection();
        $this->developers = new ArrayCollection();
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
     * @return Collection<int, Question>
     */
    public function getQuestions(): Collection
    {
        return $this->questions;
    }

    public function addQuestion(Question $question): static
    {
        if (!$this->questions->contains($question)) {
            $this->questions->add($question);
            $question->addSystem($this);
        }

        return $this;
    }

    public function removeQuestion(Question $question): static
    {
        if ($this->questions->removeElement($question)) {
            $question->removeSystem($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Developers>
     */
    public function getDevelopers(): Collection
    {
        return $this->developers;
    }

    public function addDeveloper(Developers $developer): static
    {
        if (!$this->developers->contains($developer)) {
            $this->developers->add($developer);
            $developer->addSystem($this);
        }

        return $this;
    }

    public function removeDeveloper(Developers $developer): static
    {
        if ($this->developers->removeElement($developer)) {
            $developer->removeSystem($this);
        }

        return $this;
    }
}
