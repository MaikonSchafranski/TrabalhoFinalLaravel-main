<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\EstudanteController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\ProfessorsController;
use App\Http\Controllers\ProfileController;
use App\Models\Funcionario;
use Illuminate\Support\Facades\Route;

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
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('/alunos', EstudanteController::class);
    Route::resource('/professores', ProfessorsController::class);
    Route::resource('/funcionarios', FuncionarioController::class);
    Route::get('/contato', [ContactController::class, 'index']);
    Route::post('/contato/store', [ContactController::class, 'store'])->name('contato.store');
    Route::put('/contato/update', [ContactController::class, 'update'])->name('contato.update');
    Route::delete('/contato/delete/{id}', [ContactController::class, 'destroy'])
        ->name('contato.destroy');
    Route::get('/contato/decripty', [ContactController::class, 'decripty']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__ . '/auth.php';
