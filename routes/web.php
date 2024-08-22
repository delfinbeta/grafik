<?php

use Illuminate\Support\Facades\Route;

use App\Models\Survey;

use App\Http\Controllers\SurveyController;

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
        return view('dashboard');
    })->name('dashboard');

    Route::get('/insertar', function () {
        // $survey = new Survey;

        // $survey->title = 'Titulo de la Encuesta';
        // $survey->start = '2024-09-08';
        // $survey->end = '2024-09-20';

        // $survey->save();

        $survey = Survey::create([
            'title' => 'Encuesta Test',
            'start' => '2024-10-12',
            'end' => '2024-10-25'
        ]);

        return 'Guardado';
    });

    Route::get('/actualizar/{id}', function (int $id) {
        $survey = Survey::find($id);

        // $survey->title = 'Encuesta Modificada';

        // $survey->save();

        $survey->update([
            'title' => 'Encuesta Test 2',
        ]);

        return 'Guardado';
    });

    Route::get('/eliminar/{id}', function (int $id) {
        $survey = Survey::find($id);
        $survey->delete();

        return 'Eliminado';
    });

    Route::get('/recuperar/{id}', function (int $id) {
        $survey = Survey::onlyTrashed()->where('id', $id)->first();
        $survey->restore();

        return 'Recuperado';
    });
});
