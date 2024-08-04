<?php

use App\Http\Controllers\{
	PlanController
};
use App\Http\Controllers\ProfileController;
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

// PlanController
Route::resource('/plano', PlanController::class)
	->withoutMiddleware([//withoutMiddleware => ignora a middlewares abaixo
		\Illuminate\Http\Middleware\TrustProxies::class,
		\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class
	])
	->parameters([
		'plano' => 'plan:cod'
	])
	->missing(fn () => redirect()->route('plano.index'));

//Route::resource('funcionario', EmployeeController::class)
//	->parameters([
//		'funcionario' => 'employee'//renomeando o parameter da rota que sera enviada via request para a controller
//	])
//	->middleware('tokenMiddleware:general-token,tokenMiddleware:publish,tokenMiddleware:editor');

//Route::get('/user-land', fn() => 'access granted')
//	->middleware('tokenMiddleware:simple-token');
//
//Route::resource('funcionario.endereco', EmployeeController::class)
//	->parameters([
//		'funcionario' => 'employee',//renomeando o parameter da rota que sera enviada via request para a controller
//		'endereco' => 'address'//renomeando o parameter da rota que sera enviada via request para a controller
//	])//rotas vinculadas ao funcionário (employee), use o php artisan route:list --path=funcionario para visualizar
//	->only([//escolhendo os métodos que serão permitidos
//		'index', 'show'
//	]);
//usa-se only() => somente as que quero ou
//except() => tirando as que não quero.

require __DIR__.'/auth.php';