<?php

namespace App\Twig;

use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Permet de mettre les balises nécessaires dans les menus, lorsuq'on est sur la bonne page
 * (mettre une class 'active' ou 'collapsed', etc.)
 */
class AppMenuActive extends AbstractExtension
{
    public function __construct(
        private RequestStack $requestStack
    )
    {}


    public function getFunctions()
    {
        return [
            new TwigFunction('menuActive', [$this, 'menuActive']),
        ];
    }

    /**
     * Vérifie si la route de la page en cours est contenue dans le array de routes passé en paramètre.
     * Si vrai, on retourne la variable output passée en paramètre, sinon on renvoie une string vide.
     *
     * @param array $routes Routes à trouver (peut contenir des regex)
     * @param string $output Chaine à retourner si route currente est trouvée dans les routes passées en paramètre
     * @return string
     */
    public function menuActive(array $routes, string $output)
    {
        $currentRoute = $this->requestStack->getCurrentRequest()->attributes->get('_route');

        if (in_array($currentRoute, $routes)) {
            return $output;
        } else {
            $_matches = 0;
            foreach($routes as $route) {
                preg_match('/'.$route.'/', $currentRoute, $matches);
                $_matches += count($matches);
            }
            if ($_matches) {
                return $output;
            }
        }

        return '';
    }
}
