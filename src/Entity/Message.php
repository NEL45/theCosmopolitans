<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\ORM\Mapping as ORM;
use DateTimeInterface;

/**
 * @ORM\Entity(repositoryClass=MessageRepository::class)
 */
class Message
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\ManyToOne(targetEntity=Freelancer::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private ?Freelancer $fromFreelancer;

    /**
     * @ORM\ManyToOne(targetEntity=Freelancer::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private ?Freelancer $toFreelancer;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $subject;

    /**
     * @ORM\Column(type="text")
     */
    private string $message;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private ?DateTimeInterface $sentdate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFromFreelancer(): ?Freelancer
    {
        return $this->fromFreelancer;
    }

    public function setFromFreelancer(?Freelancer $fromFreelancer): self
    {
        $this->fromFreelancer = $fromFreelancer;

        return $this;
    }

    public function getToFreelancer(): ?Freelancer
    {
        return $this->toFreelancer;
    }

    public function setToFreelancer(?Freelancer $toFreelancer): self
    {
        $this->toFreelancer = $toFreelancer;

        return $this;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(?string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getSentdate(): ?\DateTimeInterface
    {
        return $this->sentdate;
    }

    public function setSentdate(?\DateTimeInterface $sentdate): self
    {
        $this->sentdate = $sentdate;

        return $this;
    }
}
