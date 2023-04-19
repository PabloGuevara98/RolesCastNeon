<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CastsController;
use App\Http\Controllers\Admin\ParticipantesController;
use App\Http\Controllers\Admin\JuradosController;
use App\Http\Controllers\Admin\UserController;

Route::get('admin', [HomeController::class, 'index'])->name('admin.home');

Route::resource('users', UserController::class)->only(['index','edit', 'update'])->names('admin.users');

Route::resource('casts', CastsController::class)->names('admin.casts');

Route::resource('participantes', ParticipantesController::class)->names('admin.participantes');

Route::resource('jurados', JuradosController::class)->names('admin.jurados');

Route::resource('calificaciones', JuradosController::class)->names('admin.calificaciones');

