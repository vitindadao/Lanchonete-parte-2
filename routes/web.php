<?php

use App\Livewire\Admin\Cliente\ClienteCreate;
use App\Livewire\Admin\Cliente\ClienteEdit;
use App\Livewire\Admin\Funcionario\FuncionarioCreate;
use App\Livewire\Admin\Funcionario\FuncionarioEdit;
use App\Livewire\Admin\Produto\ProdutoCreate;
use App\Livewire\Admin\Produto\ProdutoEdit;
use App\Livewire\Auth\Login;

use Illuminate\Support\Facades\Route;

Route::get('cliente/create', ClienteCreate::class);
Route::get('cliente/edit/{id}', ClienteEdit::class);
Route::get('/', Login::class)->name('login');
Route::get('produto/create', ProdutoCreate::class);

Route::get('/produto/edit/{id}', ProdutoEdit::class);

Route::get('funcionario/create',FuncionarioCreate::class);

Route::get('/funcionario/edit/{id}', FuncionarioEdit::class);

