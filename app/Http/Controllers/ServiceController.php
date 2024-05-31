<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Show the form for booking a service.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function showBookingForm()
    {
        return view('booking.form');
    }

    /**
     * Handle the booking request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
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
