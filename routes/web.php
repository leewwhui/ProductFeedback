<?php

use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\RoadmapController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/feedback');
});

Route::group(['prefix' => '/feedback'], function () {
    Route::get('/', [FeedbackController::class, 'index'])->name('feedback.index');
    Route::get('/create', [FeedbackController::class, 'create'])->name('feedback.create');
    Route::get('/{feedback}', [FeedbackController::class, 'show'])->name('feedback.show');
    Route::get('/edit/{feedback}', [FeedbackController::class, 'edit'])->name('feedback.edit');
});

Route::get("/roadmap", RoadmapController::class)->name("roadmap");
