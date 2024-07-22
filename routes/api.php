<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\PostmarkController;
use App\Http\Controllers\MetricsController;

Route::middleware('auth:api')->group(function () {
    // Define your API routes here
    // Example:
    // Route::get('/users', 'UserController@index');
    // Route::post('/users', 'UserController@store');
    Route::post('/email/send', [SendEmailController::class, 'send']);

    Route::group(['prefix' => 'webhooks'], function () {
        Route::post('/postmark/{email_status_id}/opened', [PostmarkController::class, 'opened']);
        Route::post('/postmark/{email_status_id}/bounced', [PostmarkController::class, 'bounced']);
    });

    Route::group(['prefix' => 'metrics'], function () {
        Route::get('/email-status/{email_status_id}', [MetricsController::class, 'emailStatus']);
    });
});
