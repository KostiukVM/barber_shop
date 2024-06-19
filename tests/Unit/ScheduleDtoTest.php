<?php

namespace Tests\Unit;

use App\Dto\EmployeeScheduleDto;
use App\Models\Working_schedule;
use Tests\TestCase;

class ScheduleDtoTest extends TestCase
{
    protected bool $refreshDB = true;
    /**
     * A basic feature test example.
     */
    public function testWorkerScheduleDtoData(): void
    {
        $scheduleEntity = Working_schedule::first();
        $dto = new EmployeeScheduleDto($scheduleEntity);
        $transformedData = $dto->export();

        $this->assertIsArray($transformedData);
        $this->assertCount(7, $transformedData);

        $this->assertArrayHasKey('monday', $transformedData);
        $this->assertArrayHasKey('tuesday', $transformedData);
        $this->assertArrayHasKey('wednesday', $transformedData);
        $this->assertArrayHasKey('thursday', $transformedData);
        $this->assertArrayHasKey('friday', $transformedData);
        $this->assertArrayHasKey('saturday', $transformedData);
        $this->assertArrayHasKey('sunday', $transformedData);
    }
}
