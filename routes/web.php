<?php
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Rota de cadastro (somente para quem não está logado)
Route::middleware('guest.session')->group(function () {
    Route::get('/cadastro', [CadastroController::class, 'showForm'])->name('cadastro.form');
    Route::post('/cadastro', [CadastroController::class, 'cadastrar'])->name('cadastro.salvar');

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});

// Rota protegida (somente logado)
Route::middleware('auth.session')->group(function () {
    /*Route::get('/dashboard', function () {
        return view('dashboard', ['usuario' => session('usuario')]);
    })->name('dashboard');
*/
    Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
