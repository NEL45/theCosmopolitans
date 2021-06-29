<?php

namespace App\Entity;

use App\Repository\HistoryRepository;
use Doctrine\ORM\Mapping as ORM;
use DateTimeInterface;

/**
 * @ORM\Entity(repositoryClass=HistoryRepository::class)
 */
class History
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private ?Client $client;

    /**
     * @ORM\ManyToOne(targetEntity=Freelancer::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private ?Freelancer $freelancer;

    /**
     * @ORM\ManyToOne(targetEntity=Gig::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private ?Gig $gig;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private ?DateTimeInterface $createdAt;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getFreelancer(): ?Freelancer
    {
        return $this->freelancer;
    }

    public function setFreelancer(?Freelancer $freelancer): self
    {
        $this->freelancer = $freelancer;

        return $this;
    }

    public function getGig(): ?Gig
    {
        return $this->gig;
    }

    public function setGig(?Gig $gig): self
    {
        $this->gig = $gig;

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
