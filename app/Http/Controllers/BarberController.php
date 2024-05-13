<?php

namespace App\Http\Controllers;
use App\Models\Barber;
use Illuminate\Http\Request;

class BarberController extends Controller
{
    public function index()
    {
        $barbers = Barber::all(); // Отримання всіх менеджерів
        return view('barber.dashboard', ['barbers' => $barbers]);
    }
    public function dashboard()
    {
        return view('barber.dashboard');
    }

    public function profile()
    {
        return view('barber.profile');
    }
}
