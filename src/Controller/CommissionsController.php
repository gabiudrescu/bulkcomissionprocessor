<?php

namespace App\Controller;

use App\Network\TPerformant;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use TPerformant\API\Exception\ClientException;
use TPerformant\API\Filter\AdvertiserCommissionFilter;

class CommissionsController extends AbstractController
{

    /**
     * @var TPerformant
     */
    private $TPerformant;

    public function __construct(TPerformant $TPerformant)
    {
        $this->TPerformant = $TPerformant;
    }

    /**
     * @Route("/commissions", name="commissions")
     */
    public function index(Request $request)
    {
        try {
            $this->TPerformant->build(
                $request->getSession()->get('network_username'),
                $request->getSession()->get('network_password')
            );

            $commissions = $this->TPerformant->getNetwork()->getCommissions(
                (new AdvertiserCommissionFilter())->status('pending')->page(1)
            );
        } catch (ClientException $exception)
        {
            $this->addFlash('danger', $exception->getMessage());

            $request->getSession()->remove('network_username');
            $request->getSession()->remove('network_password');

            return $this->redirectToRoute('default');
        }

        return $this->render('commissions/index.html.twig', [
            'controller_name' => 'CommissionsController',
            'commissions' => $commissions
        ]);
    }
}
