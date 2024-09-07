<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ContactController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('contacts', [ContactController::class, 'index']);
Route::get('contact/{id}', [ContactController::class, 'findUser']);
Route::get('contacts/filter', [ContactController::class, 'filterByGeneral']);
Route::post('contacts', [ContactController::class, 'store']);
Route::put('contacts/{id}', [ContactController::class, 'update']);
Route::delete('contacts/{id}', [ContactController::class, 'destroy']);

Route::get('address/{contactId}', [AddressController::class, 'getAllAddressesByContactId']);
Route::post('address', [AddressController::class, 'createAddress']);
Route::put('address/{id}', [AddressController::class, 'updateAddress']);
Route::delete('address/{id}', [AddressController::class, 'deleteAddress']);

Route::get('email/{contactId}', [EmailController::class, 'getAllEmailsByContactId']);
Route::post('email', [EmailController::class, 'createEmail']);
Route::put('email/{id}', [EmailController::class, 'updateEmail']);
Route::delete('email/{id}', [EmailController::class, 'deleteEmail']);

Route::get('phone/{contactId}', [PhoneController::class, 'getAllPhonesByContactId']);
Route::post('phone', [PhoneController::class, 'createPhone']);
Route::put('phone/{id}', [PhoneController::class, 'updatePhone']);
Route::delete('phone/{id}', [PhoneController::class, 'deletePhone']);
