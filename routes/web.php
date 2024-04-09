<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Task;
use App\Http\Requests\TaskRequest;

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
        'tasks' => Task::latest()->paginate(10)
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create') -> name('tasks.create');

Route::get('/tasks/{task}/edit', function (Task $task) {

    return view('edit', ['task' => $task]);
})->name('tasks.edit');


Route::get('/tasks/{task}', function (Task $task){

    return view('show', ['task' => $task]);
})->name('tasks.show');

Route::post('/tasks', function(TaskRequest $request){

    $task = Task::create($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task created successufully');
})->name('tasks.store');

Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {

    $task -> update($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task updated successufully');
})->name('tasks.update');

Route::delete('/tasks/{task}', function(Task $task){
    $task -> delete();

    return redirect() -> route('tasks.index') -> with('success', 'Task deleted successfuly');
}) -> name('tasks.destroy');

// Route::get('/hello', function () {
//     return 'Hello';
// });

// Route:: get('/greet/{name}', function ($name) {
//     return 'Hello '.$name;
// });

// Route::fallback(function () {
//     return "still got somewhere";
// });
