<?php

namespace App\Controller;

use App\Entity\Campaign;
use App\Form\AuthenticateCampaignType;
use App\Network\TPerformant;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AuthenticateNetworkController extends AbstractController
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
     * @Route("/authenticate/network", name="authenticate_network")
     */
    public function index()
    {
        $form = $this->buildAuthForm();

        return $this->render('authenticate_network/index.html.twig', [
            'controller_name' => 'AuthenticateNetworkController',
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/authenticate/network/handle", name="handle_authenticate_network")
     *
     */
    public function authenticate(Request $request)
    {
        $form = $this->buildAuthForm();

        $form->handleRequest($request);

        if(!$form->isSubmitted() && !$form->isValid())
        {
            $this->addFlash('danger', sprintf('Could not authenticate to network: %s', $form->getErrors()));
            return $this->redirectToRoute('authenticate_network');
        }

        $this->TPerformant->build($form->get('username')->getData(), $form->get('password')->getData());


        $request->getSession()->set('network_username', $form->get('username')->getData());
        $request->getSession()->set('network_password', $form->get('password')->getData());

        $this->addFlash('success', 'logged in');

        return $this->redirectToRoute('default');
    }

    /**
     * @return \Symfony\Component\Form\FormInterface
     */
    private function buildAuthForm(): \Symfony\Component\Form\FormInterface
    {
        $form = $this->createForm(
            AuthenticateCampaignType::class,
            new Campaign(),
            [
                'action' => $this->generateUrl('handle_authenticate_network'),
                'method' => 'POST'
            ]
        );

        $form->add('submit', SubmitType::class);

        return $form;
    }
}
