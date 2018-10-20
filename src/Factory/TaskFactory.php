<?php
/**
 * Created by PhpStorm.
 * User: gabiudrescu
 * Date: 20.10.2018
 * Time: 17:30
 */

namespace App\Factory;


use App\Entity\Commission;
use App\Entity\Task;
use App\Entity\TaskCollection;
use Doctrine\ORM\EntityManagerInterface;
use League\Csv\Reader;
use Webmozart\Assert\Assert;

class TaskFactory
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->commissionRepo = $entityManager->getRepository(Commission::class);
    }

    public function buildTasksFromCsv(TaskCollection $collection)
    {
        $tasks = Reader::createFromFileObject($collection->getCsvFile()->openFile());

        $tasks->setHeaderOffset(0);

        foreach ($tasks->getRecords() as $task) {
            $object = new Task();

            $object->setExternalId($task['commission_id']);
            $object->setNewStatus($task['status']);

            // @todo handle reject and modify too

            $this->entityManager->persist($object);

            $collection->addTask($object);
        }


        $this->entityManager->persist($collection);
        $this->entityManager->flush();
    }
}
