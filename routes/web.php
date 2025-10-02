<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpenseReportController;
use App\Http\Controllers\ExpenseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Listado
Route::get('/expenses', [ExpenseReportController::class, 'index'])->name('expenses.index');
//Mostrar formulario
Route::get('/expenses/create', [ExpenseReportController::class, 'create'])->name('expenses.create');
// Guardar datos
Route::post('/expenses', [ExpenseReportController::class, 'store'])->name('expenses.store');
// Actualiza datos
Route::get('/expenses/{id}/edit', [ExpenseReportController::class, 'edit'])->name('expenses.edit');
Route::put('/expenses/{id}', [ExpenseReportController::class, 'update'])->name('expenses.update');
//Eliminar Registro
Route::get('/expenses/{id}/confirmDelete', [ExpenseReportController::class, 'confirmDelete'])->name('expenses.confirmdelete');
Route::delete('/expenses/{id}/', [ExpenseReportController::class, 'destroy'])->name('expenses.destroy');
//Ver registro
Route::get('/expenses/{id}/', [ExpenseReportController::class, 'show'])->name('expenses.show');

//New Expense
Route::get('/expenses/{expenseReport}/expenses/create', [ExpenseController::class, 'create'])->name('expenses.create');
Route::post('/expenses/{expenseReport}/expenses', [ExpenseController::class, 'store'])->name('expenses.store');

//SendEmail
Route::get('/expenses/{id}/confirmSendEmail', [ExpenseReportController::class, 'confirmSendEmail'])->name('expenses.confirmSendEmail');
Route::post('/expenses/{id}/sendEmail', [ExpenseReportController::class, 'sendEmail'])->name('expenses.sendEmail');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
