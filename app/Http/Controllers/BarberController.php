<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class BarberController extends Controller
{
    public function index()
    {
        $barbers = Employee::where('position', 3)->get(); // Отримання всіх барберів
        return view('barber.dashboard', ['barbers' => $barbers]);
    }

    public function profile()
    {
        return view('barber.profile');
    }

    public function chooseBarber(Request $request)
    {
        $barber = Employee::findOrFail($request->input('barber_id'));
        return redirect()->route('manager.dashboard')->with('success', 'You have chosen ' . $barber->name);
    }

    public function show($id)
    {
        try {
            $barber = Employee::findOrFail($id);
            return view('barbers.show', compact('barber'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Barber not found.');
        }
    }
}
