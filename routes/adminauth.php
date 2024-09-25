<?php

use App\Http\Controllers\adminauth\AuthenticatedSessionController;
use App\Http\Controllers\adminauth\ConfirmablePasswordController;
use App\Http\Controllers\adminauth\EmailVerificationNotificationController;
use App\Http\Controllers\adminauth\EmailVerificationPromptController;
use App\Http\Controllers\adminauth\NewPasswordController;
use App\Http\Controllers\adminauth\PasswordController;
use App\Http\Controllers\adminauth\PasswordResetLinkController;
use App\Http\Controllers\adminauth\RegisteredUserController;
use App\Http\Controllers\adminauth\VerifyEmailController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware'=>['guest:admin']],function() {
    Route::get('admin/register', [RegisteredUserController::class, 'create'])
                ->name('admin.register');

    Route::post('admin/register', [RegisteredUserController::class, 'store']);

    Route::get('admin/login', [AuthenticatedSessionController::class, 'create'])
                ->name('admin.login');

    Route::post('admin/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('admin/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('admin.password.request');

    Route::post('admin/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('admin.password.email');

    Route::get('admin/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('admin.password.reset');

    Route::post('admin/reset-password', [NewPasswordController::class, 'store'])
                ->name('admin.password.store');
});

Route::group(['middleware'=>['auth:admin']],function() {
    Route::get('admin/verify-email', EmailVerificationPromptController::class)
                ->name('admin.verification.notice');

    Route::get('admin/verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('admin.verification.verify');

    Route::post('admin/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('admin.verification.send');

    Route::get('admin/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('admin.password.confirm');

    Route::post('admin/confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('admin/password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('admin/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('admin.logout');
});
