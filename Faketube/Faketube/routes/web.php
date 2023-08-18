<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChannelController;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/channels",[ChannelController::class, "index"])->name('channels.index');
Route::get("/channels/create",[ChannelController::class, "create"]);
Route::post("/channels/store",[ChannelController::class, "store"])->name('channels.store');
Route::get("/channels/{ChannelID}/show",[ChannelController::class, "show"])->name('channels.show');
Route::get("/channels/{ChannelID}/edit",[ChannelController::class, "edit"])->name('channels.edit');
Route::put("/channels/{ChannelID}/update",[ChannelController::class, "update"])->name('channels.update');
Route::delete('/channels/{ChannelID}/destroy', [ChannelController::class, "destroy"])->name('channels.destroy');