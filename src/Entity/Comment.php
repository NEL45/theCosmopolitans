<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentRepository::class)
 */
class Comment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Freelancer::class, inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $freelance;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    /**
     * @ORM\Column(type="integer")
     */
    private $reactivity;

    /**
     * @ORM\Column(type="integer")
     */
    private $explanation;

    /**
     * @ORM\Column(type="integer")
     */
    private $courtesy;

    /**
     * @ORM\Column(type="integer")
     */
    private $recommandation;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comment;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $createdAt;
  
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFreelance(): ?Freelancer
    {
        return $this->freelance;
    }

    public function setFreelance(?Freelancer $freelance): self
    {
        $this->freelance = $freelance;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getReactivity(): ?int
    {
        return $this->reactivity;
    }

    public function setReactivity(int $reactivity): self
    {
        $this->reactivity = $reactivity;

        return $this;
    }

    public function getExplanation(): ?int
    {
        return $this->explanation;
    }

    public function setExplanation(int $explanation): self
    {
        $this->explanation = $explanation;

        return $this;
    }

    public function getCourtesy(): ?int
    {
        return $this->courtesy;
    }

    public function setCourtesy(int $courtesy): self
    {
        $this->courtesy = $courtesy;

        return $this;
    }

    public function getRecommandation(): ?int
    {
        return $this->recommandation;
    }

    public function setRecommandation(int $recommandation): self
    {
        $this->recommandation = $recommandation;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
