<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\User;
use App\Models\Working_schedule;
use Illuminate\Http\Request;
// add cpanel

class CpanelController extends Controller
{


    public function cpanel(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $users = User::all();
        $offers = Offer::all();

        return view('cpanel', compact('users', 'offers'));
    }
}
