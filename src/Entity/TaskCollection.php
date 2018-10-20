<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TaskCollectionRepository")
 * @Vich\Uploadable()
 */
class TaskCollection
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Task", mappedBy="taskCollection", orphanRemoval=true)
     */
    private $tasks;

    /**
     * @ORM\Column(type="integer")
     */
    private $progress = 0;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status = 'new';

    /**
     * @Vich\UploadableField(mapping="csv", fileNameProperty="csvName", size="csvSize")
     */
    private $csvFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $csvName;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $csvSize;

    public function __construct()
    {
        $this->tasks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Task[]
     */
    public function getTasks(): Collection
    {
        return $this->tasks;
    }

    public function addTask(Task $task): self
    {
        if (!$this->tasks->contains($task)) {
            $this->tasks[] = $task;
            $task->setTaskCollection($this);
        }

        return $this;
    }

    public function removeTask(Task $task): self
    {
        if ($this->tasks->contains($task)) {
            $this->tasks->removeElement($task);
            // set the owning side to null (unless already changed)
            if ($task->getTaskCollection() === $this) {
                $task->setTaskCollection(null);
            }
        }

        return $this;
    }

    public function getProgress(): ?int
    {
        return $this->progress;
    }

    public function setProgress(int $progress): self
    {
        $this->progress = $progress;

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

    public function getCsvName(): ?string
    {
        return $this->csvName;
    }

    public function setCsvName(?string $csvName): self
    {
        $this->csvName = $csvName;

        return $this;
    }

    public function getCsvSize(): ?int
    {
        return $this->csvSize;
    }

    public function setCsvSize(?int $csvSize): self
    {
        $this->csvSize = $csvSize;

        return $this;
    }

    public function setCsvFile(?File $file = null)
    {
        $this->csvFile = $file;
    }

    public function getCsvFile(): ?File
    {
        return $this->csvFile;
    }
}
