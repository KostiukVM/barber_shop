<?php

namespace App\Dto;

use App\Models\Working_schedule;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;

class EmployeeScheduleDto extends AbstractDto
{
    protected function validateModel(?Model $model)
    {
//        if ($model && !$model instanceof Employee::class)
//            throw new \Exception('Only Worker entities is acceptable');
    }

    protected function transformData(): array
    {
        return $this->model->only(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday']);
    }
}
