<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Offer;
use App\Models\Order;
use App\Models\OrderSteps;
use App\Models\Working_schedule;
use Dotenv\Validator;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function staff()
    {
        $workers = Employee::all();
        return response()->json(['data' => $workers]);
    }

    public function services()
    {
        $services = Offer::all();
        return response()->json(['data' => $services]);
    }

    public function schedule()
    {
        $stepHandler = Working_schedule::getInstance();

        if (!$stepHandler->getWorker()) {
            return response()->json(['data' => 'worker'], 302);
        }

        if (!$stepHandler->getService()) {
            return response()->json(['data' => 'service'], 302);
        }

        $timeSlots = (new TimeSlotService($stepHandler->getWorker()))
            ->calculateTimeSlots($stepHandler->getService()->duration);

        return response()->json(['data' => $timeSlots]);
    }


    // ACTION

    public function saveStep(Request $request)
    {
        $validator = Validator::make($request->all(), OrderSteps::getStepValidationReules());
        if ($validator->fails()) {
            return response()->json(['errors' =>  $validator->messages()], 406);
        }

        $stepHandler = OrderSteps::getInstance();
        $stepHandler->setStep($request->input('entity'), $request->input('data'));

        $nextStep = $stepHandler->getNextStep();

        if ($nextStep === OrderSteps::CONFIRMATION) {
            $this->createOrder($stepHandler);
            $stepHandler->renew();
        }

        return response()->json([]);
    }

    private function getRouteForStep(?string $nextStep): string
    {
        return OrderSteps::STEP_TO_ROUTES_MAPPING[$nextStep] ?? 'pages.services';
    }

    private function createOrder(OrderSteps $stepHandler)
    {
        $orderData = [
            'companyId'  => $stepHandler->getCompany()->id,
            'serviceId'  => $stepHandler->getService()->id,
            'workerId'   => $stepHandler->getWorker()->id,
            'date'       => $stepHandler->getDate(),
            'time'       => $stepHandler->getTime(),
            'price'      => $stepHandler->getPrice(),
            'duration'   => $stepHandler->getService()->duration,
        ];

        $order = Order::create($orderData);

        return $order->id;
    }
}
