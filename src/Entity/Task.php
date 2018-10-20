<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TaskRepository")
 */
class Task
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Commission", inversedBy="task", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $commission;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $new_status;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $amount;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $message;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status = 'created';

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TaskCollection", inversedBy="tasks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $taskCollection;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ExternalId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommission(): ?Commission
    {
        return $this->commission;
    }

    public function setCommission(Commission $commission): self
    {
        $this->commission = $commission;

        return $this;
    }

    public function getNewStatus(): ?string
    {
        return $this->new_status;
    }

    public function setNewStatus(string $new_status): self
    {
        $this->new_status = $new_status;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getTaskCollection(): ?TaskCollection
    {
        return $this->taskCollection;
    }

    public function setTaskCollection(?TaskCollection $taskCollection): self
    {
        $this->taskCollection = $taskCollection;

        return $this;
    }

    public function getExternalId(): ?string
    {
        return $this->ExternalId;
    }

    public function setExternalId(string $ExternalId): self
    {
        $this->ExternalId = $ExternalId;

        return $this;
    }
}
