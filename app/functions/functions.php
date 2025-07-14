<!-- vai ter todas as funções do sistema  -->

<?php

function dd($p = [])
{
    echo '<pre>';
    print_r($p);
    echo '</pre>';
    die();
}

function redirect($url)
{
    header("Location: " . $url);
    exit();
}
