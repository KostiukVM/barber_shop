<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarberController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [ServiceController::class, 'viewDashboard']
)->middleware(['auth', 'verified'])->name('dashboard');

//Route:: post('/time', [ServiceController::class, 'viewTime']
//)->middleware(['auth', 'verified'])->name('time');

Route::get('/time', [ServiceController::class, 'viewTime'])->name('time');
Route::post('/time', [ServiceController::class, 'viewTime'])->name('time.store');

Route::get('/offers', [ServiceController::class, 'viewOffers']
)->middleware(['auth', 'verified'])->name('offers');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth', 'checkRole:manager']], function () {
    // Маршрути для менеджерів
    Route::get('/manager/dashboard', [ManagerController::class, 'index'])->name('manager.dashboard');
    Route::get('/manager/profile', [ManagerController::class, 'index'])->name('manager.profile');
});

Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {
    // Маршрути для адміністраторів
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/profile', [AdminController::class, 'index'])->name('admin.profile');
});

Route::group(['middleware' => ['auth', 'checkRole:barber']], function () {
    // Маршрути для барберів
    Route::get('/assistant/dashboard', [BarberController::class, 'index'])->name('barber.dashboard');
    Route::get('/assistant/profile', [BarberController::class, 'index'])->name('barber.profile');
});


// routes/web.php

Route::group(['middleware' => ['auth', 'checkRole:barber']], function () {
    Route::get('/barber/dashboard', [BarberController::class, 'dashboard'])->name('barber.dashboard');
});

Route::post('/choose-barber', [BarberController::class, 'chooseBarber'])->name('choose.barber');


Route::post('/barbers', [BarberController::class, 'store'])->name('barbers.store');

Route::post('/service/booking', [ServiceController::class, 'bookService'])->name('service.booking');
