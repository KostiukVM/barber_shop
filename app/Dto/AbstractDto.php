<?php


namespace App\Dto;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractDto
{
    protected ?Model $model;

    public function __construct(?Model $model)
    {
        $this->validateModel($model);
        $this->model = $model;
    }

    public function export(): array
    {
        if (!$this->model) return [];

        return $this->transformData();
    }

    protected abstract function validateModel(?Model $model);

    protected abstract function transformData(): array;
}
