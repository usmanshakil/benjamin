<?php

use App\Http\Controllers\InviteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/mailtemplate', function () {
    return view('mailtemplate');
});
Route::get('/verification', function () {
    return view('verification');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/invite', [App\Http\Controllers\invitationController::class, 'index'])->name('invite');
// Route::get('register/request', 'Auth\RegisterController@requestInvitation')->name('requestInvitation');
Route::post('invitations', 'InvitationsController@store')->middleware('guest')->name('storeInvitation');
Route::post('inviteUser',[App\Http\Controllers\invitationController::class, 'store'])->name('inviteUser');
Route::post('save_user',[App\Http\Controllers\InviteController::class, 'store'])->name('save_user');

Route::get('/invite-register',[App\Http\Controllers\InviteController::class, 'index'])->name('invite-register');
Route::get('/verifypin',[App\Http\Controllers\verificationController::class, 'index'])->name('verifypin');
Route::post('verifyme',[App\Http\Controllers\verificationController::class, 'store'])->name('verifyme');


// Route::get('/sendemail', 'SendEmailController@index');
// Route::post('/sendemail/send', 'SendEmailController@send');
