<?php
function vardump($param)
{
    echo "<br>Send Method ist : " . $_SERVER['REQUEST_METHOD'] . '<br>';
    echo '<pre>';
    var_dump($param);
    echo '</pre>';
}

function printr($param)
{
    echo "<br>Send Method ist : " . $_SERVER['REQUEST_METHOD'] . '<br>';
    echo '<pre>';
    print_r($param);
    echo '</pre>';
}

function erreur($connexion)
{
    echo '<pre>';
    die(print_r($connexion->errorInfo()));
    echo '</pre>';
}
