<?php

namespace App\Library;

use App\Database\Db;

abstract class Model
{
    protected array $errors = [];
    protected $pdo;

    public function __construct()
    {
        $this->pdo = Db::connect();
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    protected function  hasErrors(): bool
    {
        return !empty($errors);
    }
}
