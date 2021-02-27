<?php

// Debuging functions
function d($data): void
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

function dd($data): void
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    die();
}

function url(string $path = ""): string
{
    return DOMAIN . $path;
}

function loadCss(string $file): string
{
    $path = "/" . "css/" . $file;
    return url($path);
}

function loadJs(string $file)
{
    $path = "/" . "js/" . $file;
    return url($path);
}
