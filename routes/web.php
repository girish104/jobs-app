<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('', fn () => to_route('jobs.index'));

Route::resource('jobs', JobController::class)->only(['index', 'show']);
