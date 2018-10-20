<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TaskStatusController extends AbstractController
{
    /**
         * @Route("/task/status", name="task_status")
     */
    public function index()
    {
        return $this->render('task_status/index.html.twig', [
            'controller_name' => 'TaskStatusController',
        ]);
    }
}
