<?php

use App\Livewire\Cliente\Create;
use App\Livewire\Cliente\Edit;
use Illuminate\Support\Facades\Route;

Route::get('cliente/create', Create::class);
Route::get('cliente/edit/{id}', Edit::class);
