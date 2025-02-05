<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Jobs\TranslateJob;
use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get("/test", function () {

  $jobListing = Job::first();
  TranslateJob::dispatch($jobListing);

  return "Dunzo";
});

Route::view("/", "home");
Route::view("/contact", "contact");

Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
Route::get('/jobs/{job}', [JobController::class, 'show']);
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware('auth')->can('edit', 'job');
Route::patch('/jobs/{job}', [JobController::class, 'update'])->middleware('auth')->can('edit', 'job');;
Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->middleware('auth')->can('edit', 'job');;


Route::get("/register", [RegisteredUserController::class, "create"]);
Route::post("/register", [RegisteredUserController::class, "store"]);
Route::get("/login", [SessionController::class, "create"])->middleware('guest')->name("login");
Route::post("/login", [SessionController::class, "store"])->middleware('guest');
Route::delete("/logout", [SessionController::class, "destroy"])->middleware('auth');
