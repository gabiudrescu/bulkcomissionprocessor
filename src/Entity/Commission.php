<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommissionRepository")
 */
class Commission
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $remote_id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $remote_action_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $amount;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Campaign", inversedBy="commissions")
     * @ORM\JoinColumn(nullable=true)
     */
    private $campaign;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Task", mappedBy="commission", cascade={"persist", "remove"})
     */
    private $task;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRemoteId(): ?string
    {
        return $this->remote_id;
    }

    public function setRemoteId(string $remote_id): self
    {
        $this->remote_id = $remote_id;

        return $this;
    }

    public function getRemoteActionId(): ?string
    {
        return $this->remote_action_id;
    }

    public function setRemoteActionId(string $remote_action_id): self
    {
        $this->remote_action_id = $remote_action_id;

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

    public function getCampaign(): ?Campaign
    {
        return $this->campaign;
    }

    public function setCampaign(?Campaign $campaign): self
    {
        $this->campaign = $campaign;

        return $this;
    }

    public function getTask(): ?Task
    {
        return $this->task;
    }

    public function setTask(Task $task): self
    {
        $this->task = $task;

        // set the owning side of the relation if necessary
        if ($this !== $task->getCommission()) {
            $task->setCommission($this);
        }

        return $this;
    }
}
