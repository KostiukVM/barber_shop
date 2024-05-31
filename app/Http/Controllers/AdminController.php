<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('admin.dashboard', ['admin' => $admins]);
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function profile()
    {
        return view('admin.profile');
    }
}
