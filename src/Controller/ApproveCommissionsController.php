<?php

namespace App\Controller;

use App\Entity\TaskCollection;
use App\Factory\TaskFactory;
use App\Form\ApproveCommissionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ApproveCommissionsController extends AbstractController
{

    /**
     * @var TaskFactory
     */
    private $factory;

    public function __construct(TaskFactory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @Route("/commissions/approve", name="approve_commissions")
     */
    public function index(Request $request)
    {
        $collection = new TaskCollection();

        $form = $this->createForm(ApproveCommissionType::class, $collection);
        $form->add('submit', SubmitType::class);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $this->factory->buildTasksFromCsv($collection);

            return $this->redirectToRoute('task_collection', ['id' => $collection->getId()]);
        }

        return $this->render('approve_commissions/index.html.twig', [
            'controller_name' => 'ApproveCommissionsController',
            'form' => $form->createView()
        ]);
    }
}
