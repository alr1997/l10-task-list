<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function(){
    return redirect() -> route('tasks.index');
});

Route::get('/tasks', function () {
    // return view('welcome');
    return view('index', [
        'tasks' => \App\Models\Task::latest()->get()
    ]);
})->name('tasks.index');

Route::get('/tasks/{id}', function ($id){

    return view('show', ['task' => \App\Models\Task::findOrFail($id)]);
})->name('tasks.show');

// Route::get('/hello', function () {
//     return 'Hello';
// });

// Route:: get('/greet/{name}', function ($name) {
//     return 'Hello '.$name;
// });

// Route::fallback(function () {
//     return "still got somewhere";
// });
