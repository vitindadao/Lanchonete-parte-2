<?php

use App\Livewire\Auth\Login;
use App\Livewire\Cliente\Create;
use App\Livewire\Cliente\Edit;
use App\Livewire\Produto\Create as ProdutoCreate;
use Illuminate\Support\Facades\Route;

Route::get('cliente/create', Create::class);
Route::get('cliente/edit/{id}', Edit::class);
Route::get('/', Login::class)->name('login');
Route::get('produto/create', ProdutoCreate::class);