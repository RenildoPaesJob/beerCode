<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SignatureController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// SIGNATURE
Route::get('/test', [SignatureController::class, 'index'])->name('signature.index');

Route::resource('funcionario', EmployeeController::class)
	->parameters([
		'funcionario' => 'employee'//renomeando o parameter da rota que sera enviada via request para a controller
	])
	->middleware('tokenMiddleware:general-token');

Route::get('/user-land', fn() => 'access granted')
	->middleware('tokenMiddleware:simple-token');

Route::resource('funcionario.endereco', EmployeeController::class)
	->parameters([
		'funcionario' => 'employee',//renomeando o parameter da rota que sera enviada via request para a controller
		'endereco' => 'address'//renomeando o parameter da rota que sera enviada via request para a controller
	])//rotas vinculadas ao funcionário (employee), use o php artisan route:list --path=funcionario para visualizar
	->only([//escolhendo os métodos que serão permitidos
		'index', 'show'
	]);
//usa-se only() => somente as que quero ou
//except() => tirando as que não quero.

require __DIR__.'/auth.php';