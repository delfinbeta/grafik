<?php

use Illuminate\Support\Facades\Route;

use App\Models\Survey;

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
    Route::get('/dashboard', function () {
        $surveys = Survey::all();
        // $surveys = Survey::where('start', '>=', '2024-09-01')->get();
        $survey = Survey::find(1);
        return view('dashboard')->with('surveys', $surveys)->with('survey', $survey);
    })->name('dashboard');
});
