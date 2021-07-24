<?php

use Illuminate\Support\Facades\Route;
use Fereloper\LaravelQuestionnaire\Http\Controllers\FormController;

Route::get('/forms', [FormController::class, 'index'])->name('forms.index');
