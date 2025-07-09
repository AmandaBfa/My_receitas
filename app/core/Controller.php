<?php

namespace App\core;

class Controller
{
    protected function load(string $view, $params = [])
    {
        $twig = new \Twig\Environment((new \Twig\Loader\FilesystemLoader('../app/site/view/')),
            ['debug' => true, 'cache' => false]
        );

        $twig->addGlobal('BASE', BASE);

        echo $twig->render($view . '.twig.php', $params);
    }
}
