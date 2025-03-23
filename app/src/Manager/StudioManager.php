<?php

namespace App\Manager;

use App\Manager\BaseManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Twig\Environment;

class StudioManager extends BaseManager
{
    private BandRepository $bandRepository;

    private Security $security;

    public function __construct(
        Environment $twig,
        RequestStack $flash,
        FormFactoryInterface $factory,
        RouterInterface $router,
        TranslatorInterface $translator,
        EntityManagerInterface $manager,
        BandRepository $repository,
        Security $security)
    {
        parent::__construct($twig, $flash, $router, $factory, $translator, $manager);
        $this->bandRepository = $repository;
        $this->security = $security;
    }

    public function getAll()
    {
        return $this->bandRepository->findAll();
    }

    public function create(Request $request): Response
    {

    }

    public function edit(Request $request): Response
    {

    }

    public function delete(Request $request): Response
    {

    }

    public function show(Request $request): Response
    {

    }
}