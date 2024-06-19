<?php

namespace App\Models;

use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class OrderSteps
{
    public const CONFIRMATION = 'confirmation';
    public const SCHEDULE = 'schedule';
    public const STAFF = 'staff';
    public const SERVICES = 'services';

    public const STEP_TO_ROUTES_MAPPING = [
        OrderSteps::CONFIRMATION => 'pages.confirmation',
        OrderSteps::SCHEDULE     => 'pages.schedule',
        OrderSteps::STAFF        => 'pages.staff',
        OrderSteps::SERVICES     => 'pages.services',
    ];

    protected ?Offer $service = null;
    protected ?Employee $worker = null;
    protected ?Company $company = null;
    protected ?string $date = null;
    protected ?string $time = null;

    public function __construct()
    {
        $this->setCompany(1);
    }

    public function getService(): ?Offer
    {
        return $this->service;
    }

    protected function setService(int $serviceId): void
    {
        $service = Offer::findOrFail($serviceId);
        $this->service = $service;
    }

    public function getWorker(): ?Employee
    {
        return $this->worker;
    }

    protected function setWorker(int $workerId): void
    {
        $worker = Employee::findOrFail($workerId);
        $this->worker = $worker;
    }

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    protected function setCompany(int $companyId): void
    {
        $company = Company::findOrFail($companyId);
        $this->company = $company;
    }

    public function getNextStep():? string
    {
        $isServiceSet  = $this->service !== null;
        $isWorkerSet   = $this->worker !== null;
        $isCompanySet  = $this->company !== null;
        $isScheduleSet = $this->date !== null && $this->time !== null;

        if ($isCompanySet && $isServiceSet && $isWorkerSet && $isScheduleSet) {
            return self::CONFIRMATION;
        }
        if ($isCompanySet && $isServiceSet && $isWorkerSet) {
            return self::SCHEDULE;
        }
        if ($isCompanySet && $isServiceSet) {
            return self::STAFF;
        }
        if ($isCompanySet && $isWorkerSet) {
            return self::SERVICES;
        }

        return null;
    }

    public function setStep(mixed $entity, mixed $data): void
    {
        switch ($entity) {
            case 'service':
                $this->setService($data);
                break;
            case 'worker':
                $this->setWorker($data);
                break;
            case 'company':
                $this->setCompany($data);
                break;
            case 'time-slot':
                $dateTime = \DateTime::createFromFormat('Y-m-d H:i', $data);

                $this
                    ->setDate($dateTime)
                    ->setTime($dateTime);

                break;
        }
        $this->flush();
    }

    public static function getInstance(): OrderSteps
    {
        $entityFromSession = Session::has('order_steps') ? Session::get('order_steps') : new self();
        Session::put('order_steps', $entityFromSession);

        return $entityFromSession;
    }

    private function flush(): void
    {
        Session::put('order_steps', $this);
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getTime(): string
    {
        return $this->time;
    }

    private function setDate(\DateTime $dateTime): self
    {
        $this->date = $dateTime->format('d-m-y');

        return $this;
    }

    private function setTime(\DateTime|bool $dateTime): self
    {
        $this->time = $dateTime->format('H:i');

        return $this;
    }

    public function getPrice(): int
    {
        $basePrice = $this->getService()->price;

        return $basePrice;
    }

    public function renew()
    {
        Session::forget('order_steps');
    }

    public static function getStepValidationReules()
    {
        return [
            'entity' => ['required','string', Rule::in(['service', 'worker', 'time-slot'])],
            'data'   => 'required',
        ];
    }
}
