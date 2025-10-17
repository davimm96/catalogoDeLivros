<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\LoginController;

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
    return view('principal');
});


Route::middleware('guest')->group(function () {
//Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//Cadastro
Route::get('/cadastro', [CadastroController::class, 'create'])->name('cadastro.create');
Route::post('cadastro', [CadastroController::class, 'store'])->name('cadastro.store');

Route::get('cadastro/cadastro', [CadastroController::class, 'store']);

});

Route::middleware('auth')->group(function () {
//Dashboard (página após o login)
Route::get('/dashboard', function(){
    if(!session('usuario')){
        return redirect()->route('login.form');
    }

    return view('dashboard');
})->name('dashboard');
});

/*
Route::get('/test-db', function(){
    try {
        DB::connection()->getPdo();
        return "✅ Conectado ao banco: ". DB::connection()->getDatabaseName();
    }catch(\Exception $e){
        return "Erro: ". $e->getMessage();
    }
});

*/
