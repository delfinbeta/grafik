<?php

use Illuminate\Support\Facades\Route;

use App\Models\Survey;

use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('login');
});

Route::get('/saludo/{name}', function (string $name) {
    return view('hello')->with('name', $name)->with('age', 15);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
