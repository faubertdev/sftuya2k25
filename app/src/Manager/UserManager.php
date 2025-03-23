<?php

namespace App\Manager;

use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasher;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Twig\Environment;

class UserManager extends BaseManager
{
    protected UserRepository $userRepository;

    private Security $security;

    private UserPasswordHasher $userPasswordHasher;

    private MailerInterface $mailer;

    public function __construct(
        TranslatorInterface $translator,
        EntityManagerInterface $entityManager,
        RequestStack $flash,
        RouterInterface $router,
        FormFactoryInterface $factory,
        Environment $twig,
        UserRepository $userRepository,
        UserPasswordhasherInterface $passwordHasher,
        MailerInterface $mailer,
        Security $security
    ){
        parent::__construct($twig, $flash, $router, $factory, $translator, $entityManager);

        $this->userRepository       = $userRepository;
        $this->security = $security;
        $this->passwordHasher = $passwordHasher;
        $this->mailerInterface = $mailer;
    }

    public function getAll()
    {
        return $this->userRepository->findAll();
    }

    public function create(Request $request): Response
    {

    }

    public function edit(Request $request, User $user): Response
    {

    }

    public function delete(Request $request): Response
    {

    }

    public function profil(Request $request): Response
    {

    }

    public function changeActivation(Request $request): Response
    {

    }

    public function changePassword(Request $request): Response
    {

    }

    public function updateUserInfos(Request $request): Response
    {

    }

    public function updateuserDetails(Request $request): Response
    {

    }
}