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

    /**
     * showMessage
     *
     * @param  string $message
     * @param  string $uri
     * @return void
     */
    protected function showMessage(string $titulo, string $message, string $uri, int $httpCode = 200)
    {
        http_response_code($httpCode);
        $this->load('partials/mensagem', [
            'titulo' => $titulo,
            'mensagem' => $message,
            'uri' => $uri
        ]);
    }
}
