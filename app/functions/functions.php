<!-- vai ter todas as funções do sistema  -->

<?php

function dd($p = [])
{
    echo '<pre>';
    print_r($p);
    echo '</pre>';
    die();
}

// function dd($p = []) {
//     // Função para depuração de dados
//     echo '<pre>';
//     print_r($p);
//     echo '</pre>';
//     die();
// }
