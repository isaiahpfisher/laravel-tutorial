<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('home');
});

// Index
Route::get("/jobs", function () {
  $jobs = Job::with('employer')->latest()->simplePaginate(3);
  return view('jobs/index', ['jobs' => $jobs]);
});

// Create
Route::get("/jobs/create", function () {
  return view("jobs/create");
});

// Show
Route::get("/jobs/{id}", function ($id) {
  return view("jobs/show", ["job" => Job::find($id)]);
});

// Store
Route::post("/jobs", function () {

  request()->validate([
    'title' => ['required', 'min:3'],
    'salary' => ['required'],
  ]);

  Job::create([
    'title' => request('title'),
    'salary' => request('salary'),
    'employer_id' => 1,
  ]);

  return redirect("/jobs");
});

// Edit
Route::get("/jobs/{id}/edit", function ($id) {
  return view("jobs/edit", ["job" => Job::find($id)]);
});

// Update
Route::patch("/jobs/{id}", function ($id) {
  request()->validate([
    'title' => ['required', 'min:3'],
    'salary' => ['required'],
  ]);

  // authorize (on hold)

  Job::findOrFail($id)->update([
    'title' => request('title'),
    'salary' => request('salary'),
  ]);

  return redirect("/jobs/{$id}");
});

// Destory
Route::delete("/jobs/{id}", function ($id) {
  // authorize (on hold)

  Job::findOrFail($id)->delete();

  return redirect("/jobs");
});

Route::get("/contact", function () {
  return view("contact");
});
