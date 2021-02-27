<?php

namespace App\Library;

use League\Plates\Engine;

abstract class Controller
{
    protected $templates;
    
    public function __construct()
    {
        $this->templates = new Engine(__DIR__ . "/../view");
    }

    protected function redirect($path = ""): void
    {
        $path = url($path);
        header("Location: " . $path);
    }
    
}