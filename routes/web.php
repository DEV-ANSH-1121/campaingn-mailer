<?php

use App\Http\Controllers\Module\MailCampaignController;
use App\Http\Controllers\Module\MailLogController;
use App\Http\Controllers\Module\MailTemplateController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Module\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    if (auth()->check()) {
        return redirect('/dashboard');
    }else{
        return redirect('/login');
    }
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('users', UserController::class);
    Route::resource('mailTemplates', MailTemplateController::class);
    Route::resource('mailCampaigns', MailCampaignController::class);
    Route::resource('/mailLogs', MailLogController::class);
});

Route::get('mark-mail-read', [MailCampaignController::class, 'markMailRead'])->name('markMailRead');

require __DIR__.'/auth.php';
