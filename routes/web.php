<?php

use App\Livewire\Auth\Login;
use App\Livewire\Cliente\Create;
use App\Livewire\Cliente\Edit;
use App\Livewire\Funcionario\Create as FuncionarioCreate;
use App\Livewire\Funcionario\Edit as FuncionarioEdit;
use App\Livewire\Produto\Create as ProdutoCreate;
use App\Livewire\Produto\Edit as ProdutoEdit;
use Illuminate\Support\Facades\Route;

Route::get('cliente/create', Create::class);
Route::get('cliente/edit/{id}', Edit::class);
Route::get('/', Login::class)->name('login');
Route::get('produto/create', ProdutoCreate::class);

Route::get('/produto/edit/{id}', ProdutoEdit::class);

Route::get('funcionario/create',FuncionarioCreate::class);

Route::get('/funcionario/edit/{id}', FuncionarioEdit::class);

