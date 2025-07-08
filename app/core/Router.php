<?php

// é bem engessado, não tem como mudar o nome da classe, tem que ser assim
// ele é responsável por carregar os controllers, models e views

namespace App\Core;

class Router
{
    private $uriEx;

    // é o construtor da classe, ele é chamado quando a classe é instanciada
    // ele chama o método init, que é responsável por inicializar a classe
    public function __construct()
    {
        $this->init();
        $this->execute();
    }

    // é o método init, ele é responsável por inicializar a classe
    // ele pega a URI da requisição e separa em partes, removendo os vaz
    private function init()
    {
        $uri = $_SERVER['REQUEST_URI'];

        $uri = str_replace('?', '/', $uri); // remove a base URL da URI

        $ex = explode('/', $uri);

        $ex = array_values(array_filter($ex)); // remove os valores vazios do array

        for ($i = 0; $i < UNSET_COUNT; $i++) {
            unset($ex[$i]); // remove os primeiros valores do array, que são desnecessários
        }

        $ex = array_values(array_filter($ex)); // remove os valores vazios do array

        $this->uriEx = $ex; // armazena o array de partes da URI na propriedade uriEx
        // dd($ex);
        // dd($this->uriEx);
    }


    private function execute()
    {
        // aqui ele vai instanciar o controller e chamar o método
        $class = 'HomeController'; // aqui você pode mudar para o controller que você quiser
        $method = 'index'; // aqui você pode mudar para o método que você quiser

        if (isset($this->uriEx[0])) {
            $c = 'App\\Site\\Controller\\' . ucfirst($this->uriEx[0]) . 'Controller';
            if (class_exists($c)) {
                $class = ucfirst($this->uriEx[0]) . 'Controller';
            }

            $controller = 'App\\Site\\Controller\\' . $class;

            if (isset($this->uriEx[1])) {
                if (method_exists($controller, $this->uriEx[1])) {
                    $method = $this->uriEx[1];
                }
            }

            call_user_func_array(
                [
                    new $controller(),
                    $method
                ],
                $this->getParams()
            );
        }
    }

    private function getParams()
    {
        $p = [];

        if (count($this->uriEx) > 2) {

            for ($i = 2; $i < count($this->uriEx); $i++) {
                $p[] = $this->uriEx[$i]; // pega os parâmetros da URI a partir do terceiro elemento
            }

            $p = array_slice($this->uriEx, 2); // pega os parâmetros da URI a partir do terceiro elemento
        }

        return $p;
    }
}
