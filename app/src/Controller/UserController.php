<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user_list_user')]
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    #[Route('/user/{id}', name: 'app_user_show_user')]
    public function show($id): Response
    {

    }

    #[Route('/user/add', name: 'app_user_add_user')]
    public function add(Request $request): Response
    {

    }

    #[Route('/user/{id}/edit', name: 'app_user_edit_user')]
    public function edit($id, Request $request): Response
    {

    }

    #[Route('/user/{id}/delete', name: 'app_user_delete_user')]
    public function delete($id, Request $request): Response
    {

    }
}
