<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Offer;
use App\Models\Working_schedule;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function viewDashboard()
    {
        $barbers = Employee::all()->where('position', 2);
        return view('dashboard', ['barbers' => $barbers]);
    }

    public function viewTime()
    {
        $employee = Employee::all()->where('working_schedule', 1);
//      $schedule = Working_schedule::all()->where('id', 1);

        $times = [8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20];
        return view('time', ['times' => $times]);
    }
    public function viewOffers()
    {
        $offers = Offer::all();
        return view('offers', ['offers'=>$offers]);
    }
    public function showBookingForm()
    {
        return view('booking.form');
    }

    public function bookService(Request $request)
    {
        //  код обробки бронювання послуги тут

        // Після обробки запиту перенаправляємо користувача на сторінку з підтвердженням
        return redirect()->route('booking.confirmation')->with('success', 'Service booked successfully!');
    }

    /**
     * Show the booking confirmation page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function showConfirmation()
    {
        return view('booking.confirmation');
    }
}
