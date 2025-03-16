<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LocalProductController extends AbstractController
{
    #[Route('/local/product', name: 'app_local_product')]
    public function index(): Response
    {
        return $this->render('local_product/index.html.twig', [
            'controller_name' => 'LocalProductController',
        ]);
    }
}
