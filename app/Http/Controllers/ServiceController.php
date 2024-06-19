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

    public function viewTime(Request $request)
    {
        $times = [
            '08:00', '09:00', '10:00', '11:00',
            '12:00', '13:00', '14:00', '15:00',
            '16:00', '17:00', '18:00', '19:00'
        ];

        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'day' => 'required',
                'time' => 'required'
            ]);

            $day = $validatedData['day'];
            $time = $validatedData['time'];

            // Шукаємо існуючий розклад або створюємо новий
            $workingSchedule = Working_schedule::firstOrCreate(
                [], // пошук без умов, тож знайде або створить перший запис
                ['start_hours' => 800, 'end_hours' => 1800] // значення за замовчуванням
            );

            // Оновлюємо розклад для обраного дня
            $workingSchedule->$day = true;
            $workingSchedule->save();

            return redirect()->route('time')->with('success', 'Schedule updated successfully.');
        }

        return view('time', compact('times'));
    }

    public function viewOffers()
    {
        $offers = Offer::all();
        return view('offers', ['offers' => $offers]);
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
