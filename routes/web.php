<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

Route::get('/', function () {
    return view('welcome');
});

// Resource Routes
Route::resource('/projects', ProjectController::class)->names([
    'index' => 'project.index',
    'create' => 'project.create',    
    'store' => 'project.store',
    'show' => 'project.show',
    'edit' => 'project.edit',
    'update' => 'project.update',
    'destroy' => 'project.destroy',
]);
