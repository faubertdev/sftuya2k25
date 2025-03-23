<?php

namespace App\Manager;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Twig\Environment;

class BaseManager
{
    protected Environment $twig;

    protected RequestStack $requestStack;

    protected FormFactoryInterface $formFactory;

    protected RouterInterface $router;

    protected TranslatorInterface $translator;

    protected EntityManagerInterface $entityManager;

    protected Response $response;

    public function __construct(
        Environment $twig,
        RequestStack $flash,
        RouterInterface $router,
        FormFactoryInterface $formFactory,
        TranslatorInterface $translator,
        EntityManagerInterface $entityManager)
    {
        $this->twig = $twig;
        $this->flash = $flash;
        $this->router = $router;
        $this->formFactory = $formFactory;
        $this->translator = $translator;
        $this->entityManager = $entityManager;
    }

    public function getResponse(): Response
    {
        return $this->response;
    }

    public function setResponse(string $view, array $params = []): Response
    {
        $view = $this->twig->render($view, $params);

        $response = new Response();

        $response->setContent($view);

        return $this->response = $response;
    }

    public function setRedirectResponse(string $route, array $params = []): Response
    {
        $url = $this->router->generate($route, $params);

        $response = new RedirectResponse($url);

        return $this->response = $response;
    }
}