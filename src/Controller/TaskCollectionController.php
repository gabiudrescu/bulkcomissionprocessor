<?php

namespace App\Controller;

use App\Entity\TaskCollection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TaskCollectionController extends AbstractController
{
    /**
     * @Route("/task_collection/{id}", name="task_collection")
     */
    public function status(TaskCollection $collection)
    {
        return $this->render('task_collection/index.html.twig', [
            'controller_name' => 'TaskCollectionController',
            'collection' => $collection
        ]);
    }
}
