<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InviteController extends AbstractController
{
    #[Route('/invite', name: 'invite')]
    public function index(): Response
    {
        return $this->render('invite/index.html.twig', [
            'controller_name' => 'InviteController',
        ]);
    }
}
