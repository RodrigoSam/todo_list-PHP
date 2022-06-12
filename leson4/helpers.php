<?php

use App\core\Application;

function view($name, array $params = [])
{
    extract($params);

    return require "views/{$name}.view.php";
}

function app(): Application
{
    return Application::getInstance();
}

function dd($args)
{
    var_dump($args);
    die();
}